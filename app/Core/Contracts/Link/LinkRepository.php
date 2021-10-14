<?php

namespace App\Core\Contracts\Link;

interface LinkRepository
{
    public function getById(int $id): ?LinkData;
    public function getByBaseLink(string $baseLink): ?LinkData;
    public function getByResultLink(string $resultLink): ?LinkData;
    public function getAll(): array;
}
