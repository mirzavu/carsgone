# Laravel PHP Framework

# Commands to install

install git
install git-lfs
take pull

composer install

create database
configure .env
php artisan migrate
php artisan db:seed
php artisan db:seed --class=VehiclesTableSeeder
php artisan db:seed --class=BodyStyleGroupsTableSeeder
php artisan db:seed --class=MakesTableSeeder
php artisan db:seed --class=ModelsTableSeeder
php artisan db:seed --class=ProvincesTableSeeder
php artisan db:seed --class=CitiesTableSeeder
php -d memory_limit=3G artisan db:seed --class=PostalCodesTableSeeder