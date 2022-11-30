<?php

namespace JKHarley\FilamentTrumbowyg\traits;

use Closure;

trait HasButtons
{
    protected array | Closure | null $buttons = null;

    public function buttons(array | Closure | null $buttons): static
    {
        $this->buttons = $buttons;

        return $this;
    }

    public function getButtons(): ?array
    {
        return $this->evaluate($this->buttons);
    }
}
