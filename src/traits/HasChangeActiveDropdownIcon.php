<?php

namespace JKHarley\FilamentTrumbowyg\traits;

use Closure;

trait HasChangeActiveDropdownIcon
{
    protected bool|Closure|null $changeActiveDropdownIcon = null;

    public function changeActiveDropdownIcon(bool|Closure|null $changeActiveDropdownIcon): static
    {
        $this->changeActiveDropdownIcon = $changeActiveDropdownIcon;

        return $this;
    }

    public function getChangeActiveDropdownIcon(): ?bool
    {
        return $this->evaluate($this->changeActiveDropdownIcon);
    }
}
