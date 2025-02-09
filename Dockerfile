# 1️⃣ PHP 8.1 और Apache को Use करो
FROM php:8.1-apache

# 2️⃣ Apache के लिए mod_rewrite Enable करो
RUN a2enmod rewrite

# 3️⃣ Working Directory Set करो
WORKDIR /var/www/html

# 4️⃣ Host Machine से Files Copy करो
COPY . /var/www/html/

# 5️⃣ Uploads Folder Create करो और Permissions Set करो
RUN mkdir -p /var/www/html/uploads \
    && chown -R www-data:www-data /var/www/html/uploads \
    && chmod -R 777 /var/www/html/uploads

# 6️⃣ Apache Server को Start करो
CMD ["apache2-foreground"]
