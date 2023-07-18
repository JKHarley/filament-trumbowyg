<?php

namespace JKHarley\FilamentTrumbowyg\traits;

use Closure;

trait HasRemoveFormatPasted
{
    protected bool|Closure|null $removeFormatPasted = null;

    public function removeFormatPasted(bool|Closure|null $removeFormatPasted): static
    {
        $this->removeFormatPasted = $removeFormatPasted;

        return $this;
    }

    public function getRemoveFormatPasted(): ?bool
    {
        return $this->evaluate($this->removeFormatPasted);
    }
}
