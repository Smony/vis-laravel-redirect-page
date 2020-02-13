# Vis Laravel Redirect page

# Installation

####Publish the configs:
######Install the package
```
php artisan vendor:publish --provider="Vis\LaravelRedirectPage\VisRedirectPageServiceProvider" --tag="migrations"
```
######Published configs
```
php artisan vendor:publish --provider="Vis\LaravelRedirectPage\VisRedirectPageServiceProvider" --tag="config"
```
######Published configs for `builder_lara_5`
```
php artisan vendor:publish --provider="Vis\LaravelRedirectPage\VisRedirectPageServiceProvider" --tag="vis-config"
```
######Add middleware
```
\Vis\LaravelRedirectPage\Middleware\VisRedirect::class,
```
######Publish migration
```
php artisan migrate
```
