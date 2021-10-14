<?php

namespace App\Core\Implementations\Link;

use App\Core\Contracts\Link\LinkData;
use App\Core\Contracts\Link\LinkRepository;

class EloquentLinkRepository implements LinkRepository
{
    public function getById(int $id): ?LinkData
    {
        return Link::find($id);
    }

    public function getByBaseLink(string $baseLink): ?LinkData
    {
        return Link::where('base_link', $baseLink)->first();
    }

    public function getByResultLink(string $resultLink): ?LinkData
    {
        return Link::where('result_link', $resultLink)->first();
    }

    public function getAll(): array
    {
        return Link::all()->toArray();
    }
}
