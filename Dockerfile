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

# ファイルをサーバーにコピー
COPY . /var/www/html/

# サーバー内で「vendor」フォルダを生成
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 権限の設定
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 【変更箇所】entrypoint.shを使わず、起動時にキャッシュ最適化とマイグレーションを実行してApacheを立ち上げる
CMD php /var/www/html/artisan config:cache && \
    php /var/www/html/artisan route:cache && \
    php /var/www/html/artisan view:cache && \
    php /var/www/html/artisan migrate --force && \
    apache2-foreground

