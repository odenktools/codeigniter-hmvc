# Codeigniter 3.x HMVC

## Requirements

* PHP 7.2.x
* Composer

## Features

* Laravel Eloquent 5.2.x
* HMVC
* Migration
* DotEnv
* Rest Api (TODO)
* AdminLTE (TODO)

```bash
composer install
```

Copy default environment

```bash
cp .env.example .env.development
```

Edit database connection on ```.env.development``` file.

Run Database Migration

```
php index.php migrate
```

# Available Routes

#### Frontend

```
http://codeigniter.local.com
```

```
http://codeigniter.local.com/welcome
```

```
http://codeigniter.local.com/welcome/say_hello
```

#### Admin

```
http://codeigniter.local.com/admin/hello
```

Create user records

```
http://codeigniter.local.com/admin/hello/create_data
```

Login user

```
http://codeigniter.local.com/admin/hello/login
```

List all user
```
http://codeigniter.local.com/admin/hello/list_data
```
