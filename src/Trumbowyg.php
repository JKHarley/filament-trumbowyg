<?php

namespace JKHarley\FilamentTrumbowyg;

use Filament\Forms\Components\Concerns\HasPlaceholder;
use JKHarley\FilamentTrumbowyg\traits\HasButtons;

class Trumbowyg extends \Filament\Forms\Components\Field
{
    use HasPlaceholder;
    use HasButtons;

    protected string $view = 'filament-trumbowyg::trumbowyg';
}
