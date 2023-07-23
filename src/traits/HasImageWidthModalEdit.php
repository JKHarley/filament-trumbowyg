<?php

namespace JKHarley\FilamentTrumbowyg\traits;

use Closure;

trait HasImageWidthModalEdit
{
    protected bool|Closure|null $imageWidthModalEdit = null;

    public function imageWidthModalEdit(bool|Closure|null $imageWidthModalEdit): static
    {
        $this->imageWidthModalEdit = $imageWidthModalEdit;

        return $this;
    }

    public function getImageWidthModalEdit(): ?bool
    {
        return $this->evaluate($this->imageWidthModalEdit);
    }
}
