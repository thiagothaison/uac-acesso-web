## User Account Control for Acesso Web
[![Packagist License](https://poser.pugx.org/barryvdh/laravel-debugbar/license.png)](http://choosealicense.com/licenses/mit/)

## Installation

Require this package with composer. It is recommended to only require the package for development.

```shell
composer require thiagothaison/uac-acesso-web
```

Add the ServiceProvider to the providers array in config/app.php

```php
AcessoWeb\Providers\AcessoWebProvider::class,
```

And replace the HashServiceProvider

```php
Illuminate\Hashing\HashServiceProvider::class,
```

with

```php
AcessoWeb\Libraries\HashServiceProvider::class,
```

## Usage

You can now replace in your Auth/LoginController.php

```php
use Illuminate\Foundation\Auth\AuthenticatesUsers;
```

with

```php
use AcessoWeb\Traits\Auth\AuthenticatesUsers;
```
