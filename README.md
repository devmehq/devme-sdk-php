# DEV.ME SDK for PHP
[![Build Status](https://github.com/devmehq/devme-sdk-php/actions/workflows/ci.yml/badge.svg)](https://github.com/devmehq/devme-sdk-php/actions/workflows/ci.yml)
[![Composer Version](https://img.shields.io/packagist/v/devmehq/sdk-php)](https://packagist.org/packages/devmehq/sdk-php)
[![Downloads](https://img.shields.io/packagist/dm/devmehq/sdk-php)](https://packagist.org/packages/devmehq/sdk-php)

DEV.ME SDK for PHP

> Works with php version >= 7.1, Compatible with all PHP Frameworks like laravel, symfony, wordpress, etc.

## Get Your Free API Key
[Signup Here](https://dev.me/signup) and Get Your Free API Key

## Installation and usage instructions

## Installation
Install the module through YARN:
```shell
composer require devmehq/sdk-php
```

## Examples

### Currency API Conversion
```php
use DevmeSdk\Authentication\APIKeyHeaderAuthentication;
use Jane\Component\OpenApiRuntime\Client\Plugin\AuthenticationRegistry;

$authenticationRegistry = new AuthenticationRegistry([new APIKeyHeaderAuthentication('demo-key')]);
$apiClient = \DevmeSdk\Client::create(null, [$authenticationRegistry]);

$apiClient->v1ConvertCurrency(['from' => 'USD', 'to' => 'EUR', 'amount' => 10]);

// {
//   convertedAmount: 8.819,
//   convertedText: '10 USD equal to 8.819 EUR',
//   exchangeRate: 0.8819,
//   from: 'USD',
//   originalAmount: 10,
//   rateTime: '2022-01-20T14:49:28.046Z',
//   to: 'EUR'
// }
```

### IP API Geolocation, IP2Location, IP Data
```php
use DevmeSdk\Authentication\APIKeyHeaderAuthentication;
use Jane\Component\OpenApiRuntime\Client\Plugin\AuthenticationRegistry;

$authenticationRegistry = new AuthenticationRegistry([new APIKeyHeaderAuthentication('demo-key')]);
$apiClient = \DevmeSdk\Client::create(null, [$authenticationRegistry]);

$apiClient->v1GetIpDetails([ 'ip' => '52.45.23.11']);

// {
//   asn: 14618,
//   aso: 'AMAZON-AES',
//   city: {
//   accuracyRadius: 1000,
//     latitude: 39.0469,
//     longitude: -77.4903,
//     metroCode: 511,
//     name: 'Ashburn',
//     timeZone: 'America/New_York',
//   },
//   countryCode: 'US',
//   ip: '52.45.23.11',
//   registeredCountryCode: 'US',
// }

```

### Avanced Email Validation API
```php
use DevmeSdk\Authentication\APIKeyHeaderAuthentication;
use Jane\Component\OpenApiRuntime\Client\Plugin\AuthenticationRegistry;

$authenticationRegistry = new AuthenticationRegistry([new APIKeyHeaderAuthentication('demo-key')]);
$apiClient = \DevmeSdk\Client::create(null, [$authenticationRegistry]);

$apiClient->v1GetEmailDetails([ 'ip' => '52.45.23.11']);

// {
//   asn: 14618,
//   aso: 'AMAZON-AES',
//   city: {
//   accuracyRadius: 1000,
//     latitude: 39.0469,
//     longitude: -77.4903,
//     metroCode: 511,
//     name: 'Ashburn',
//     timeZone: 'America/New_York',
//   },
//   countryCode: 'US',
//   ip: '52.45.23.11',
//   registeredCountryCode: 'US',
// }

```


## Testing
```shell
composer test
```

## Need Help?
If you need help please drop us a message, we would be glad to help @ [Contact us](http://dev.me/contact-us)


## Contributing
Please feel free to open an issue or create a pull request and fix bugs or add features, All contributions are welcome. Thank you!

## LICENSE [MIT](LICENSE.md)
