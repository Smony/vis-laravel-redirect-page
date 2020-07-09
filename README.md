# Vis Laravel Redirect page

## Installation

```sh
composer require smony/laravel-redirect-page
```

### Publish the configs
Published configs

```php
php artisan vendor:publish --provider="Vis\LaravelRedirectPage\VisRedirectPageServiceProvider" --tag="migrations"

php artisan vendor:publish --provider="Vis\LaravelRedirectPage\VisRedirectPageServiceProvider" --tag="config"
```

Published config for `builder_lara_5`

```php
php artisan vendor:publish --provider="Vis\LaravelRedirectPage\VisRedirectPageServiceProvider" --tag="vis-config"
```

Add middleware for class Kernel

```php
 protected $middleware = [
    \Vis\LaravelRedirectPage\Middleware\VisRedirect::class,
  ];
```

Publish migration

```php
php artisan migrate
```
