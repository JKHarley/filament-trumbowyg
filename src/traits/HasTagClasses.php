<?php

namespace JKHarley\FilamentTrumbowyg\traits;

use Closure;

trait HasTagClasses
{
    protected array|Closure|null $tagClasses = null;

    public function tagClasses(array|Closure|null $tagClasses): static
    {
        $this->tagClasses = $tagClasses;

        return $this;
    }

    public function getTagClasses(): ?array
    {
        return $this->evaluate($this->tagClasses);
    }
}