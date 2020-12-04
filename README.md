cd SupportSystem
create .env and update
composer update
npm install && run dev

php artisan migrate
php artisan db:seed
php artisan serve

Agent Login
2 Agents added using db seeder


    1.  "email" => "abc.comrep@gmail.com",
        "password" => "abc1234"

    2.  "email" => "arc@gmail.com",
        "password" => "arc1234"
