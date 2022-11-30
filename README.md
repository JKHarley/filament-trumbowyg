# Filament Trumbowyg

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jkharley/filament-trumbowyg.svg?style=flat-square)](https://packagist.org/packages/jkharley/filament-trumbowyg)
[![Total Downloads](https://img.shields.io/packagist/dt/jkharley/filament-trumbowyg.svg?style=flat-square)](https://packagist.org/packages/jkharley/filament-trumbowyg)

[//]: # ([![GitHub Tests Action Status]&#40;https://img.shields.io/github/workflow/status/jkharley/filament-trumbowyg/run-tests?label=tests&#41;]&#40;https://github.com/jkharley/filament-trumbowyg/actions?query=workflow%3Arun-tests+branch%3Amain&#41;)

[//]: # ([![GitHub Code Style Action Status]&#40;https://img.shields.io/github/workflow/status/jkharley/filament-trumbowyg/Check%20&%20fix%20styling?label=code%20style&#41;]&#40;https://github.com/jkharley/filament-trumbowyg/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain&#41;)

[Trumbowyg](https://alex-d.github.io/Trumbowyg/) wysiwyg editor field for Filament.

<img width="1518" alt="Screenshot 2022-11-27 at 18 04 49" src="https://user-images.githubusercontent.com/27085725/204152174-cc7d0ed5-6911-4e49-adc0-eb839df70261.png">
 

## Installation

You can install the package via composer:

```bash
composer require jkharley/filament-trumbowyg
```

[//]: # (You can publish the config file with:)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --tag="filament-trumbowyg-config")

[//]: # (```)

[//]: # ()
[//]: # (Optionally, you can publish the views using)

[//]: # ()
[//]: # (```bash)

[//]: # (php artisan vendor:publish --tag="filament-trumbowyg-views")

[//]: # (```)

[//]: # ()
[//]: # (This is the contents of the published config file:)

[//]: # ()
[//]: # (```php)

[//]: # (return [)

[//]: # (];)

[//]: # (```)

## Usage

```php
use JKHarley\FilamentTrumbowyg\Trumbowyg;

Trumbowyg::make('my-field')
```

### Buttons Pane Customisation

You can customise the buttons pane by passing an array of buttons to the buttons key in the `filament-trumbowyg` config file. This will overwrite the default buttons pane set by Trumbowyg and will be used across all `Trumbowyg` fields.

```php
// config/filament-trumbowyg.php
'buttons' => [
    ['undo', 'redo'],
    ['strong', 'em', 'del'],
    'link',
    'fullscreen',
],

// app/Filament/Resources/MyResource.php
Trumbowyg::make('my-field')
    ->buttons(),
```

Alternatively you can pass an array of buttons to the `buttons` method on the field. 
You can also use this to overwrite the buttons set in the config file for a specific field.

```php
Trumbowyg::make('my-field')
    ->buttons([
        ['undo', 'redo'],
        ['strong', 'em', 'del'],
        'link',
        'fullscreen',
    ]),
```

## Future Additions
- Theme customisation

[//]: # (## Testing)

[//]: # ()
[//]: # (```bash)

[//]: # (composer test)

[//]: # (```)

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [James Harley](https://github.com/JKHarley)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
