FROM php:8.2-apache

# 1. 必要なLinuxパッケージとPHP拡張機能をインストール（変更なし）
RUN apt-get update && apt-get install -y unzip git libzip-dev libpq-dev \
    && docker-php-ext-install zip pdo_mysql pdo_pgsql

# 2. Renderの仕様に合わせて、Apacheのポートを80番から10000番に変更（変更なし）
RUN sed -i 's/Listen 80/Listen 10000/g' /etc/apache2/ports.conf
RUN sed -i 's/<VirtualHost \*:80>/<VirtualHost \*:10000>/g' /etc/apache2/sites-available/*.conf

# 3. Apacheの公開フォルダを Laravelの public に変更（変更なし）
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# 4. Laravelの動作に必要な設定（mod_rewriteの有効化）（変更なし）
RUN a2enmod rewrite

# 5. 作業ディレクトリを設定
WORKDIR /var/www/html

# 【★ここが最重要★】
# ローカルでステップ1を実行して作成した「vendor」フォルダを含め、
# すべてのプログラム・パッケージをそのまま丸ごとコンテナにコピーします。
# これにより、Render上での危険な「composer install」を完全にスキップします。
COPY . /var/www/html/

# 6. 権限の設定
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# 7. 起動時にキャッシュ最適化とマイグレーションを実行してApacheを立ち上げる
CMD php /var/www/html/artisan config:clear && \
    php /var/www/html/artisan migrate --force && \
    apache2-foreground
