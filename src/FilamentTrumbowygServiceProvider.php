<?php

namespace JKHarley\FilamentTrumbowyg;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentTrumbowygServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-trumbowyg';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            // Styles
            Css::make('trumbowyg-core', 'https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.26.0/ui/trumbowyg.min.css'),

            // Scripts
            Js::make('jquery', 'https://code.jquery.com/jquery-3.6.1.min.js'),
            Js::make('trumbowyg-core', 'https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.26.0/trumbowyg.min.js'),
        ], 'jkharley/'.static::$name);
    }
}
