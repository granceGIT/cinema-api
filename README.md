## Информация
API Кинотеатра, система проектировалась под макет и планируемый функционал. Возможно дальнейшее расширение функционала
Проект не закончен
К нему также разрабатывается SPA на VUE3.js: https://github.com/granceGIT/cinema_spa

## Установка
Для того чтобы запустить проект необходимо скачать его на локальный диск и перейти к расположению
Установить необходимые зависимости
```
$ git clone https://github.com/granceGIT/cinema-api.git
$ cd cinema-api
$ composer install
```

## Запуск
Чтобы запустить скопируйте и переименуйте файл .env.example в .env
Создайте базу данных
В файле .env установите необходимые параметры подключения к базе данных
Запустите миграции и сидеры
```
php artisan migrate --seed

```
После того как процесс завершится можно запустить локальный сервер командой
```
php artisan serve
```

API будет доступен по адресу указанном в консоли.

## Information
Cinema API
Project is currently beeing developed
There is also SPA using vue3.js: https://github.com/granceGIT/cinema_spa

## Installation
First you need to clone project to local machine and go to location folder
Intall dependencies
```
$ git clone https://github.com/granceGIT/cinema-api.git
$ cd cinema-api
$ composer install
```

## Running
To run the app you need to copy and rename file .env.example to .env
Create database
Update .env
Run migrations and seeders
```
php artisan migrate --seed

```
After that you can run local server
```
php artisan serve
```
