<?php

namespace JKHarley\FilamentTrumbowyg\traits;

use Closure;

trait HasSemantic
{
    protected bool|Closure|null $semantic = null;

    public function semantic(bool|Closure|null $semantic): static
    {
        $this->semantic = $semantic;

        return $this;
    }

    public function getSemantic(): ?bool
    {
        return $this->evaluate($this->semantic);
    }
}
