# Utiliser l'image officielle PHP avec Apache
FROM php:8.1-apache

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copier les fichiers de l'application dans le conteneur
COPY . /var/www/html/

# Définir le dossier de travail
WORKDIR /var/www/html

# Donner les permissions correctes
RUN chown -R www-data:www-data /var/www/html

# Exposer le port 80
EXPOSE 80

# Lancer Apache
CMD ["apache2-foreground"]
