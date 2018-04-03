Boilerplate for knowledge testing system.

- Theory, tests, rich and interactive practical exercises. 
- User and admin roles.
- Formattable editor for theory; 
- Admin dashboard;
- Create your own tests

Examples for cryptography course, but can be used in any discipline.

Laravel, React & MySQL | 2016

login:
`admin@main.com`
password:
`123456`

## pre-requisites 
Create local .env file with your own DB params 

## install

`composer install`
`npm install`

### Databese migration
1. Create database 'study' in your mysql server
2. Migrate DB from a dump (in project root):
`mysql -p study -u root < database/study.sql`

## generating laravel key
`php artisan key:generate`

## run
`./artisan composer serve`