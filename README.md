# CodeIgniter 4 app

## Features:
1. Create, Read, Delete, and Update

## How to use:

1. #### clone / download this repo
2. #### create .env file and copy anything inside env
3. #### create database and edit .env file until this lines fits your environment

``` env
database.default.hostname = localhost
database.default.database = db_ci
database.default.username = root
database.default.password = root
database.default.DBDriver = MySQLi
```

5. #### on the terminal / cmd run:
```bash
php spark migrate AddNews
php spark db:seed NewsSeeder
php spark serve
```
