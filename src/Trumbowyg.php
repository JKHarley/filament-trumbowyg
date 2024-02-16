<?php

namespace JKHarley\FilamentTrumbowyg;

use Filament\Forms\Components\Concerns\HasPlaceholder;
use JKHarley\FilamentTrumbowyg\traits\HasButtons;
use JKHarley\FilamentTrumbowyg\traits\HasChangeActiveDropdownIcon;
use JKHarley\FilamentTrumbowyg\traits\HasImageWidthModalEdit;
use JKHarley\FilamentTrumbowyg\traits\HasLinkTargets;
use JKHarley\FilamentTrumbowyg\traits\HasMinimalLinks;
use JKHarley\FilamentTrumbowyg\traits\HasRemoveFormatPasted;
use JKHarley\FilamentTrumbowyg\traits\HasSemantic;
use JKHarley\FilamentTrumbowyg\traits\HasTagClasses;
use JKHarley\FilamentTrumbowyg\traits\HasTagsToKeep;
use JKHarley\FilamentTrumbowyg\traits\HasTagsToRemove;
use JKHarley\FilamentTrumbowyg\traits\HasUrlProtocol;

class Trumbowyg extends \Filament\Forms\Components\Field
{
    use HasButtons;
    use HasChangeActiveDropdownIcon;
    use HasImageWidthModalEdit;
    use HasLinkTargets;
    use HasMinimalLinks;
    use HasPlaceholder;
    use HasRemoveFormatPasted;
    use HasSemantic;
    use HasTagClasses;
    use HasTagsToKeep;
    use HasTagsToRemove;
    use HasUrlProtocol;

    protected string $view = 'filament-trumbowyg::trumbowyg';
}
