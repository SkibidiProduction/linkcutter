<?php

namespace App\Core\Contracts\Link;

Interface LinkData
{
    public function id(): int;
    public function baseLink(): string;
    public function resultLink(): string;
    public function setBaseLink(string $baseLink): string;
    public function setResultLink(string $resultLink): string;
    public function store(): bool;
}
