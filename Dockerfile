FROM php:8.2-apache

# Apacheの公開フォルダ（ドキュメントルート）を Laravelの public に変更
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Laravelの動作に必要な設定（mod_rewriteの有効化）
RUN a2enmod rewrite

# ファイルをサーバーにコピー
COPY . /var/www/html/

# フォルダの権限（パーミッション）を設定
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80