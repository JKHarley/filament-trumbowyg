<?php

namespace JKHarley\FilamentTrumbowyg;

use Filament\Forms\Components\Concerns\HasPlaceholder;
use JKHarley\FilamentTrumbowyg\traits\HasButtons;
use JKHarley\FilamentTrumbowyg\traits\HasChangeActiveDropdownIcon;
use JKHarley\FilamentTrumbowyg\traits\HasSemantic;
use JKHarley\FilamentTrumbowyg\traits\HasTagClasses;

class Trumbowyg extends \Filament\Forms\Components\Field
{
    use HasPlaceholder;
    use HasButtons;
    use HasTagClasses;
    use HasChangeActiveDropdownIcon;
    use HasSemantic;

    protected string $view = 'filament-trumbowyg::trumbowyg';
}
