git clone https://github.com/mahdi173/IOT-management.git

cd IOT-management

run composer install

run cp .env.example .env

run php artisan key:generate

run ./vendor/bin/sail up

run ./vendor/bin/sail npm install && ./vendor/bin/sail npm run build

run ./vendor/bin/sail artisan migrate --seed

To test the script:
1- run ./vendor/bin/sail php artisan app:update-modules
2- add * * * * * cd ~/IOT-management && ./vendor/bin/sail php artisan schedule:run >> ~/mylog.txt 2>&1  
to the crontab so it can run the command automatically every 5 minutes