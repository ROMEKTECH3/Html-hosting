# PHP + Apache
FROM php:8.1-apache

# वर्किंग डायरेक्ट्री सेट करें
WORKDIR /var/www/html

# अपनी PHP फाइल्स कॉपी करें
COPY . /var/www/html

# अपाचे सर्वर रन करें
CMD ["apache2-foreground"]
