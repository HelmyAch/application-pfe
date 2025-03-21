# Utiliser l'image officielle PHP 8.1 avec Apache
FROM php:8.1-apache

# Installer les dépendances système nécessaires
RUN apt-get update && apt-get install -y \
    libmariadb-dev \
    && rm -rf /var/lib/apt/lists/*

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Activer le module Apache rewrite (si nécessaire pour l'application)
RUN a2enmod rewrite

# Copier les fichiers de l'application dans le conteneur
COPY . /var/www/html/

# Définir le dossier de travail
WORKDIR /var/www/html

# Donner les permissions correctes à l'utilisateur www-data
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Exposer le port 80
EXPOSE 80

# Lancer Apache en mode foreground
CMD ["apache2-foreground"]