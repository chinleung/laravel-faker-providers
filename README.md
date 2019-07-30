# Laravel Faker Providers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chinleung/laravel-faker-providers.svg?style=flat-square)](https://packagist.org/packages/chinleung/laravel-faker-providers)
[![Build Status](https://img.shields.io/travis/chinleung/laravel-faker-providers/master.svg?style=flat-square)](https://travis-ci.org/chinleung/laravel-faker-providers)
[![Quality Score](https://img.shields.io/scrutinizer/g/chinleung/laravel-faker-providers.svg?style=flat-square)](https://scrutinizer-ci.com/g/chinleung/laravel-faker-providers)
[![Total Downloads](https://img.shields.io/packagist/dt/chinleung/laravel-faker-providers.svg?style=flat-square)](https://packagist.org/packages/chinleung/laravel-faker-providers)

A collection of extra [Faker](https://github.com/fzaninotto/Faker) providers.

## Installation

You can install the package via composer:

```bash
composer require chinleung/laravel-faker-providers
```

## Providers

<details>
<summary>TranslatableAttributeProvider</summary>  
  
### Note
  
This is a provider for JSON columns of [Spatie's Laravel Translatable](https://github.com/spatie/laravel-translatable) package.
  
### Methods
    
*  [translatable](#translatable)
*  [translatableName](#translatableName)
  
### translatable(\Closure $callable, array $locales = null) : array
_Pass a closure to be executed for every locale._

<details>
<summary>Example</summary>
  
```php
$faker->translatable(function () use ($faker) {
  return strtolower($faker->word);  
});
```

**Output**
 
```php
['en' => 'laravel', 'fr' => 'php']
```
</details>
    

### translatableName(array $locales = null) : array
_Generate a name for every locale._

<details>
<summary>Example</summary>
  
```php
$faker->translatableName;
```

**Output**
 
```php
['en' => 'John Doe', 'fr' => 'Jane Doe']
```
</details>
</details>

## Usage

Add the provider that you need to your `Faker\Generator` instance and simply use a method of the provider:

``` php
factory(User::class, function (Faker $faker) {
    $faker->addProvider(new \ChinLeung\LaravelFakerProviders\TranslatableAttributeProvider($faker));
  
    return [
      'name' => $faker->translatableName, // ['en' => 'John Doe', 'fr' => 'Jane Doe']
    ];
});
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email chinleung94@gmail.com instead of using the issue tracker.

## Credits

- [Chin Leung](https://github.com/chinleung)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
