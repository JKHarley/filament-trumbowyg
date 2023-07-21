<?php

namespace JKHarley\FilamentTrumbowyg\traits;

use Closure;

trait HasTagsToKeep
{
    protected array|Closure|null $tagsToKeep = null;

    public function tagsToKeep(array|Closure|null $tagsToKeep): static
    {
        $this->tagsToKeep = $tagsToKeep;

        return $this;
    }

    public function getTagsToKeep(): ?array
    {
        return $this->evaluate($this->tagsToKeep);
    }
}
