# Eliminar carpeta *vendor*
# Ejecutar desde el directorio raiz del proyecto los comandos

composer update --ignore-platform-req=ext-gd --ignore-platform-req=ext-fileinfo
composer require psr/simple-cache:^1.0 maatwebsite/excel --ignore-platform-req=ext-gd

php artisan key:generate

php artisan cache:clear

php artisan config:clear

php artisan migrate:fresh --seed



php artisan serve
