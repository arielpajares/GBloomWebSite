FROM php:8.2-apache

# Activar mod_rewrite para URLs amigables
RUN a2enmod rewrite

# Habilitar SSL en Apache
RUN a2enmod ssl

# Copiar configuración personalizada de Apache
COPY apache/vhost.conf /etc/apache2/sites-available/000-default.conf

# Configurar permisos para /var/www/html
RUN chown -R www-data:www-data /var/www/html

# Exponer puertos HTTP y HTTPS
EXPOSE 80 443
