Laravel_DoctrineDBAL
=======

Doctrine DBAL integration for Laravel

## Overview

`nayjest/laravel-doctrine-dbal` package provides:
* **Doctrine DBAL connection** based on your default Laravel DB connection, initialized by same PDO connection object
* **Facade** for default Doctrine DBAL connection and automatically created **alias**
* **SQL Queries Logging setup**. Queries executed via Doctrine DBAL will be present in DB::getQueryLog() and "Queries" tab of `barryvdh/laravel-debugbar`

## Installation

Via [Composer](https://getcomposer.org)

1. Run following command:

```bash
composer require nayjest/laravel-doctrine-dbal
```
2. Register Nayjest\LaravelDoctrineDBAL\ServiceProvider in your application configuration file

## Testing

Run following command:

```bash
phpunit
```

## 6. License

© 2014 — 2015 Vitalii Stepanenko

Licensed under the MIT License.

Please see [License File](LICENSE) for more information.
