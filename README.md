# Laravel PHP Framework

# Commands to install

vim /etc/apache2/apache2.conf
Include /etc/phpmyadmin/apache.conf  (at bottom)

sudo apt-get install git
install git-lfs
sudo git clone -b dev https://github.com/mirzavu/carsgone.git html

Permissions (Inside docroot)
sudo chown -R ubuntu:ubuntu ./
sudo find ./ -type f -exec chmod 644 {} \;
sudo find ./ -type d -exec chmod 755 {} \;
sudo chgrp -R www-data storage bootstrap/cache
sudo chmod -R ug+rwx storage bootstrap/cache

git config core.fileMode false

sudo apt-get install curl php-cli php-mbstring git unzip
cd ~
curl -sS https://getcomposer.org/installer -o composer-setup.php
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
composer install



create database
configure .env

comment out config/database.php socket

php artisan migrate
php artisan db:seed
//php -d memory_limit=3G artisan db:seed --class=PostalCodesTableSeeder

sudo vim /etc/apache2/sites-available/000-default.conf
add this
<Directory "/var/www/html/">
        AllowOverride All
        </Directory>
 sudo a2enmod rewrite
 sudo systemctl restart apache2

 edit .htaccess in docroot folder
 <IfModule mod_rewrite.c>
        RewriteEngine On
        RewriteRule ^(.*)$ public/$1 [L]
</IfModule>