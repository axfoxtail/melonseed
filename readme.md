## About Melonseed

Melonseed is based on Laravel 5.8.

Database Drive is MYSQL.

## How to install Melonseed on the server

https://medium.com/@sagarnasit/deploy-laravel-application-with-lemp-stack-ubuntu-and-enginx-e82a4445b3d2

## DB Migration

First, You have to DB on your server.

Required Fields: databasename, username, password.

The above fileds should be matched with the values of .env of your project.

Then, 

sudo php artisan migrate
or
sudo php artisan migrate:fresh
or
sudo php artisan migrate:fresh --seed

## Avoiding issue

If you change the .env file or config files, project may not working well.

Please try with this cli cmd.

sudo php artisan cache:clear
sudo php artisan config:clear

## Advice

Melonseed used GCM APIs for integrating geolocation.
Besides this, melonseed uses the `IPSTACK` and `BATTUTA` API
Also, It used the gmail to verify emails registered.
So don't forget the API keys in the .env file.

===== for email verification ======
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=<yourgmail@gmail.com>
MAIL_PASSWORD=<yourpassword>
MAIL_ENCRYPTION=tls
MAIL_FROM_NAME=<YourName>

~ You should allow `Less secure app access` on your app google account.
https://myaccount.google.com/security

===== Required API KEYS =====
GOOGLE_MAP_API_KEY=<Google Map API Key>
IPSTACK_KEY=<YOUR IPSTACK KEY>
BATTUTA_KEY=<YOUR BATTUTA KEY>