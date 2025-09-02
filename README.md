# Nova Redirect Manager

[![Novius CI](https://github.com/novius/laravel-nova-redirect-manager/actions/workflows/main.yml/badge.svg?branch=main)](https://github.com/novius/laravel-nova-redirect-manager/actions/workflows/main.yml)
[![Packagist Release](https://img.shields.io/packagist/v/novius/laravel-nova-redirect-manager.svg?maxAge=1800&style=flat-square)](https://packagist.org/packages/novius/laravel-nova-redirect-manager)
[![Licence](https://img.shields.io/packagist/l/novius/laravel-nova-redirect-manager.svg?maxAge=1800&style=flat-square)](https://github.com/novius/laravel-nova-redirect-manager#licence)

This package provides a Nova Tool to manage redirects with [spatie/laravel-missing-page-redirector](https://github.com/spatie/laravel-missing-page-redirector).

## Requirements

* PHP >= 7.3
* Laravel Nova >= 4.0
* Laravel Framework >= 8.0

## Installation

You can install the package via composer:

```sh
composer require novius/laravel-nova-redirect-manager
```

The package will automatically register itself.

Next, launch migrations :

```ssh
php artisan migrate
```

Next, you must register the `Spatie\MissingPageRedirector\RedirectsMissingPages` middleware and publish the config file :
See [spatie/laravel-missing-page-redirector](https://github.com/spatie/laravel-missing-page-redirector?tab=readme-ov-file#installation) for more information.


## Configuration

In the `config/missing-page-redirector.php` file, change the `redirector` key to `Novius\LaravelNovaRedirectManager\Redirector\DatabaseRedirector::class` :

```php

return [
    //...

    /*
     * This is the class responsible for providing the URLs which must be redirected.
     * The only requirement for the redirector is that it needs to implement the
     * `Spatie\MissingPageRedirector\Redirector\Redirector`-interface
     */
    'redirector' => \Novius\LaravelNovaRedirectManager\Redirector\DatabaseRedirector::class,
];
```

You can also publish the configuration file if you want to change values for this package :

```
php artisan vendor:publish --provider="Novius\LaravelNovaRedirectManager\RedirectManagerServiceProvider" --tag=config
```

```php
return [

    /*
     * This is the model used by the database redirector
     */
    'redirector_model' => \Novius\LaravelNovaRedirectManager\Models\Redirect::class,

    /*
     * This is the nova resource used to manage Redirect items
     */
    'redirect_nova_resource' => \Novius\LaravelNovaRedirectManager\Resources\Redirect::class,

    /*
     * This max length rule for Redirect item
     */
    'redirect_url_max_length' => 1000,
];
```

## Language

You can also publish the lang files :

```
php artisan vendor:publish --provider="Novius\LaravelNovaRedirectManager\RedirectManagerServiceProvider" --tag=lang
```

## Lint

Run php-cs with:

```sh
composer run-script lint
```

## Contributing

Contributions are welcome!
Leave an issue on Github, or create a Pull Request.


## Licence

This package is under [GNU Affero General Public License v3](http://www.gnu.org/licenses/agpl-3.0.html) or (at your option) any later version.
