<?php

namespace JKHarley\FilamentTrumbowyg\traits;

use Closure;

trait HasUrlProtocol
{
    protected bool|string|Closure|null $urlProtocol = null;

    public function urlProtocol(bool|string|Closure|null $urlProtocol): static
    {
        $this->urlProtocol = $urlProtocol;

        return $this;
    }

    public function getUrlProtocol(): bool|string|null
    {
        return $this->evaluate($this->urlProtocol);
    }
}
