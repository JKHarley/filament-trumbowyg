<?php

namespace JKHarley\FilamentTrumbowyg\traits;

use Closure;

trait HasLinkTargets
{
    protected array|Closure|null $linkTargets = null;

    public function linkTargets(array|Closure|null $linkTargets): static
    {
        $this->linkTargets = $linkTargets;

        return $this;
    }

    public function getLinkTargets(): ?array
    {
        return $this->evaluate($this->linkTargets);
    }
}
