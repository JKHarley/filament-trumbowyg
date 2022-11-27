<?php

namespace JKHarley\FilamentTrumbowyg;

use Filament\PluginServiceProvider;
use Spatie\LaravelPackageTools\Package;

class FilamentTrumbowygServiceProvider extends PluginServiceProvider
{
    public static string $name = 'filament-trumbowyg';

    protected array $styles = [
        'plugin-filament-trumbowyg' => __DIR__.'/../resources/dist/filament-trumbowyg.css',
        'trumbowyg-core' => 'https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.26.0/ui/trumbowyg.min.css',
    ];

    protected array $scripts = [
        'plugin-filament-trumbowyg' => __DIR__.'/../resources/dist/filament-trumbowyg.js',
        'jquery' => 'https://code.jquery.com/jquery-3.6.1.min.js',
        'trumbowyg-core' => 'https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.26.0/trumbowyg.min.js',
    ];

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasAssets()
            ->hasViews();
    }
}
