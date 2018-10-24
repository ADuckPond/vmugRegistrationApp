# vmugRegistrationApp
App for simplifying the registration process for VMUG's.

Docker Containers Used:
arm32v7/php:7.0-apache
 - Dependencies:
   - apt-get install libpq-dev
   - docker-php-ext-install pgsql
   - docker-php-ext-install pdo_pgsql
   - set env vars in /etc/apache2/envvars - follow standard in file for setting vars

arm32v7/postgres
