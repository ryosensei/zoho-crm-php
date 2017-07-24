# Laravel implementation for Zoho CRM API wrapper library (PHP)

This is an API wrapper library for Zoho CRM, written in PHP.
It aims to cover the whole API (every module and method), while providing a great abstraction and very easy-to-use methods.

This package is using the package [Zoho CRM Php](https://github.com/tristanjahier/zoho-crm-php)
# Installation

## Install package
```composer require ryosensei/zoho-laravel-crm-php```

## Register Service provider

Add `Zoho\CRM\ZohoServiceProvider::class,` to your config/app.php file 

## Publish configuration

`php artisan vendor:publish --provider="Zoho\CRM\ZohoServiceProvider" --tag=config`

## Use in controller

```
use Zoho\CRM\Client as ZohoClient;
[...]
$zoho = new ZohoClient();
```