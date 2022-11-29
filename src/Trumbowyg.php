<?php

namespace JKHarley\FilamentTrumbowyg;

use Filament\Forms\Components\Concerns\HasPlaceholder;

class Trumbowyg extends \Filament\Forms\Components\Field
{
    use HasPlaceholder;

    protected string $view = 'filament-trumbowyg::trumbowyg';
}
