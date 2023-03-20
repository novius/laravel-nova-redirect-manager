# Nova Redirect Manager

[![Travis](https://img.shields.io/travis/novius/laravel-nova-redirect-manager.svg?maxAge=1800&style=flat-square)](https://travis-ci.org/novius/laravel-nova-redirect-manager)
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

Next, you must register the `Spatie\MissingPageRedirector\RedirectsMissingPages` middleware :

```php
//app/Http/Kernel.php

protected $middleware = [
    ...
    \Spatie\MissingPageRedirector\RedirectsMissingPages::class,
],
```

Next, register the Tool in `NovaServiceProvider` class :

```php
//app/Providers/NovaServiceProvider.php

public function tools()
{
    return [
        ...,
        new LaravelNovaRedirectManager(),
    ];
}
```

## Configuration

This package provides a configuration file whose values overwrite the configuration of `spatie/laravel-missing-page-redirector`.

You can publish the configuration file if you want to change these values :
```
php artisan vendor:publish --provider="Novius\LaravelNovaRedirectManager\RedirectManagerServiceProvider" --tag=config
```

You can also publish the migrations, lang and views :
```
php artisan vendor:publish --provider="Novius\LaravelNovaRedirectManager\RedirectManagerServiceProvider" --tag=migrations
php artisan vendor:publish --provider="Novius\LaravelNovaRedirectManager\RedirectManagerServiceProvider" --tag=lang
php artisan vendor:publish --provider="Novius\LaravelNovaRedirectManager\RedirectManagerServiceProvider" --tag=views
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
