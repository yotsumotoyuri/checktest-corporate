FROM php:8.2-apache

# Laravelに必要なPHPの拡張機能と、Composerをインストール
RUN apt-get update && apt-get install -y unzip git libzip-dev libpq-dev \
    && docker-php-ext-install zip pdo_mysql pdo_pgsql
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ⚠️ Renderの仕様に合わせて、Apacheのポートを80番から10000番に変更 ⚠️
RUN sed -i 's/Listen 80/Listen 10000/g' /etc/apache2/ports.conf
RUN sed -i 's/<VirtualHost \*:80>/<VirtualHost \*:10000>/g' /etc/apache2/sites-available/*.conf

# Apacheの公開フォルダを Laravelの public に変更
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Laravelの動作に必要な設定（mod_rewriteの有効化）
RUN a2enmod rewrite

# 作業ディレクトリの設定
WORKDIR /var/www/html

# 先に設定ファイルだけをコピーして環境依存を無視する準備をする
COPY composer.json composer.lock ./

# 【最重要】監査機能をオフにし、メモリ制限と環境依存（バージョン違い）を完全に無視して強制インストール
RUN composer config policy.advisories.block false && \
    COMPOSER_MEMORY_LIMIT=-1 composer install --no-dev --optimize-autoloader --no-interaction --no-audit --ignore-platform-reqs --no-scripts

# 残りの全ファイルをサーバーにコピー
COPY . /var/www/html/

# 権限の設定
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 起動時にキャッシュ最適化とマイグレーションを実行してApacheを立ち上げる
CMD php /var/www/html/artisan config:cache && \
    php /var/www/html/artisan route:cache && \
    php /var/www/html/artisan view:cache && \
    php /var/www/html/artisan migrate --force && \
    apache2-foreground
