Онлайн-система для оценки знаний. Описание используемых технологий и развертывания.

## Tech & frameworks: 
php 5.6, laravel 5.2, mysql, apache2

## Required libs & packages: 
php5-gmp, php5-mcrypt, composer

## Deployment.

1. Создать таблицу "study" (например) в mysql
2. Скопировать файл .env из env.example и указать имя таблицы, хост и логин\пароль от БД
3. In project root(linux shell): 

"composer install"
"php artisan key:generate"
"mysql -p study -u root < database/study.sql" //миграция БД. study.sql - дамп БД - не нужноо мигрировать через стандартный artisan migrate + есть начальные данные и примеры тестов

## Запуск
php artisan serve --port=8080 //Запуск проекта на dev-сервере
