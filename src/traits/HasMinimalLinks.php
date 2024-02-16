<?php

namespace JKHarley\FilamentTrumbowyg\traits;

use Closure;

trait HasMinimalLinks
{
    protected bool|Closure|null $minimalLinks = null;

    public function minimalLinks(bool|Closure $minimalLinks = true): static
    {
        $this->minimalLinks = $minimalLinks;

        return $this;
    }

    public function getMinimalLinks(): ?bool
    {
        return $this->evaluate($this->minimalLinks);
    }
}
