# Change logs

## Build-in web server

- [Built-in web server](https://www.php.net/manual/en/features.commandline.webserver.php)

## Setup composer

```sh
composer init --name tingtt/trainig-php -l MIT
```

## PHPStan

- [Getting Started](https://phpstan.org/user-guide/getting-started)

```sh
composer require --dev phpstan/phpstan
vendor/bin/phpstan analyze router.php src
```

## Pest

- [Installation](https://pestphp.com/docs/installation)

```sh
composer require pestphp/pest --dev --with-all-dependencies
```

```sh
vendor/bin/pest --init
vendor/bin/pest
```
