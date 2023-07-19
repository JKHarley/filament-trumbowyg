<?php

namespace JKHarley\FilamentTrumbowyg\traits;

use Closure;

trait HasTagsToRemove
{
    protected array|Closure|null $tagsToRemove = null;

    public function tagsToRemove(array|Closure|null $tagsToRemove): static
    {
        $this->tagsToRemove = $tagsToRemove;

        return $this;
    }

    public function getTagsToRemove(): ?array
    {
        return $this->evaluate($this->tagsToRemove);
    }
}
