## Installation

Install fresh Laravel project, then add this package via composer:
```
composer require magdicom/laravel-test-initial:"*"
```

## Optional Configuration
To publish the config file, run the following command:
```
php artisan vendor:publish --tag=test-initial-config
```
this will place `testinitial.php` file inside `/config` directory where you can specify discount per category/sku and currency.


## API

Filter parameters are `category`, `price_from` and `price_to`, these parameters can be used individually or combined:
```
# All products
http://localhost/api/products
http://localhost/api/products?category=insurance
http://localhost/api/products?price_from=200000
http://localhost/api/products?price_to=90000
http://localhost/api/products?category=insurance&price_from=50000
http://localhost/api/products?price_from=150000&price_to=250000
```

## Live Test

[https://test-initial.momagdi.com/api/products](https://test-initial.momagdi.com/api/products)
[https://test-initial.momagdi.com/api/products?category=insurance](https://test-initial.momagdi.com/api/products?category=insurance)
[https://test-initial.momagdi.com/api/products?price_from=200000](https://test-initial.momagdi.com/api/products?price_from=200000)
[https://test-initial.momagdi.com/api/products?price_to=90000](https://test-initial.momagdi.com/api/products?price_to=90000)
[https://test-initial.momagdi.com/api/products?category=insurance&price_from=50000](https://test-initial.momagdi.com/api/products?category=insurance&price_from=50000)
[https://test-initial.momagdi.com/api/products?price_from=150000&price_to=250000](https://test-initial.momagdi.com/api/products?price_from=150000&price_to=250000){:target="_blank"}
