[![Latest Stable Version](https://poser.pugx.org/outhebox/laravel-pointabl/v/stable)](https://packagist.org/packages/outhebox/laravel-pointabl)
[![Total Downloads](https://poser.pugx.org/outhebox/laravel-pointabl/downloads)](https://packagist.org/packages/outhebox/laravel-pointabl)
[![Latest Unstable Version](https://poser.pugx.org/outhebox/laravel-pointabl/v/unstable)](https://packagist.org/packages/outhebox/laravel-pointabl) [![License](https://poser.pugx.org/outhebox/laravel-pointabl/license)](https://packagist.org/packages/outhebox/laravel-pointabl)

# Laravel Pointable

Point Transaction system for Laravel 5+

Original Package from [Trexology](https://github.com/Trexology/laravel-pointable)

## Installation

First, pull in the package through Composer.

```js
composer require outhebox/laravel-pointable
```

And then include the service provider within `app/config/app.php`.

```php
'providers' => [
    Outhebox\Pointable\PointableServiceProvider::class
];
```

At last you need to publish and run the migration.
```
php artisan vendor:publish --provider="Outhebox\Pointable\PointableServiceProvider" && php artisan migrate
```

-----

### Setup a Model
```php
<?php

namespace App;

use Outhebox\Pointable\Contracts\Pointable;
use Outhebox\Pointable\Traits\Pointable as PointableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Pointable
{
    use PointableTrait;
}
```

### Add Points
```php
$user = User::first();
$amount = 10; // (Double) Can be a negative value
$message = "The reason for this transaction";

//Optional (if you modify the point_transaction table)
$data = [
    'ref_id' => 'someReferId',
];

$transaction = $user->addPoints($amount,$message,$data);

dd($transaction);
```

### Get Current Points
```php
$user = User::first();
$points = $user->currentPoints();

dd($points);
```

### Get Transactions
```php
$user = User::first();
$user->transactions;

//OR
//$user['transactions'] = $user->transactions(2)->get(); //Get last 2 transactions

dd($user);
```

### Count Transactions
```php
$user = User::first();
$user['transactions_total'] = $user->countTransactions();

dd($user);
```
