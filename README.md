# Laravel PHP Framework

# Commands to install

install git
install git-lfs
clone master
checkout dev branch
take pull
install composer
composer install

create database
configure .env
cd docroot
sudo chown -R carsgone:carsgone ./
sudo find ./ -type f -exec chmod 644 {} \;

php artisan migrate
php artisan db:seed
php -d memory_limit=3G artisan db:seed --class=PostalCodesTableSeeder

sudo vim /etc/apache2/sites-available/000-default.conf
add this
<Directory "/var/www/html/">
        AllowOverride All
        </Directory>
 enable modrewrite
 edit .htaccess