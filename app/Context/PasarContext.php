<?php

namespace App\Context;

class PasarContext
{
    protected ?int $pasarId = null;

    public function set(?int $id): void
    {
        $this->pasarId = $id;
    }

    public function id(): ?int
    {
        return $this->pasarId;
    }

    public function check(): bool
    {
        return $this->pasarId !== null;
    }
}