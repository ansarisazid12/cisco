# invoice
Laravel based Billing software (Include Saas And GST)


## Installation steps

git clone https://github.com/Laravelzone/invoice.git


cd invoice

composer install

cp .env.example .env (if windows : use copy instead of cp command)

touch database/database.sqlite (or create an  empty file  database folder file name: database.sqlite)

php artisan db:seed


php artisan serve


