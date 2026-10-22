FROM php:8.2-apache

# 1. 必要なLinuxパッケージとPHP拡張機能をインストール
RUN apt-get update && apt-get install -y unzip git libzip-dev libpq-dev \
    && docker-php-ext-install zip pdo_mysql pdo_pgsql

# 2. Composer公式イメージから最新の実行ファイルを直接コピーして設置
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 3. Renderの仕様に合わせて、Apacheのポートを80番から10000番に変更
RUN sed -i 's/Listen 80/Listen 10000/g' /etc/apache2/ports.conf
RUN sed -i 's/<VirtualHost \*:80>/<VirtualHost \*:10000>/g' /etc/apache2/sites-available/*.conf

# 4. Apacheの公開フォルダを Laravelの public に変更
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# 5. Laravelの動作に必要な設定（mod_rewriteの有効化）
RUN a2enmod rewrite

# 6. 作業ディレクトリを設定し、先に設定ファイルだけを配置
WORKDIR /var/www/html
COPY composer.json composer.lock ./

# 7. 【最重要】トラブルの元になる複雑な設定コマンドを排除し、
#     メモリ制限解除とセキュリティ監査（Audit）オフの状態で素直にインストールさせる
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader --no-interaction --no-audit --no-scripts

# 8. 残りの全ファイルをサーバーにコピー
COPY . /var/www/html/

# 9. 権限の設定
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 10. 起動時にキャッシュ最適化とマイグレーションを実行してApacheを立ち上げる
CMD php /var/www/html/artisan config:cache && \
    php /var/www/html/artisan route:cache && \
    php /var/www/html/artisan view:cache && \
    php /var/www/html/artisan migrate --force && \
    apache2-foreground
