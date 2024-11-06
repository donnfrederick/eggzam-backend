# Backend for Exam

This app uses Laravel for the backend and Vue3 for the frontend. They are connected using CORS, and this API only allows the url http://localhost:5173. You can modifiy it in the config/cors.php on line 9
To coordinate with the frontend, make sure to include --port=8001 in your starting command
eg. php artisan serve --port=8001

To setup, open terminal and run these commands:

`composer install` and wait for it to finish

`cp .env.example .env`

`php artisan migrate`

`php artisan server --port=8001`
