# Codeigniter 3.x HMVC

## Requirements

* PHP 7.2.x
* Composer

## Features

* Laravel Eloquent 5.2.x
* HMVC
* Migration
* DotEnv
* Rest Api
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

#### Api

Hello Controller

```bash
curl -X GET \
  http://codeigniter.local.com/api/hello/list \
  -H 'cache-control: no-cache'
```


```bash
curl -X POST \
  http://codeigniter.local.com/api/hello/createdata \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'cache-control: no-cache' \
  -F username=johndoe \
  -F email=johndoe@gmail.com \
  -F password=johndoe
```

```bash
curl -X GET \
  http://codeigniter.local.com/api/hello/login \
  -H 'cache-control: no-cache'
```


Welcome Controller

```bash
curl -X GET \
  http://codeigniter.local.com/api/welcome \
  -H 'cache-control: no-cache'
```

```bash
curl -X GET \
  http://codeigniter.local.com/api/welcome/index \
  -H 'cache-control: no-cache'
```
