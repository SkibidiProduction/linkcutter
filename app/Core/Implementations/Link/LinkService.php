<?php

namespace App\Core\Implementations\Link;

use App\Core\Contracts\Link\LinkData;
use App\Core\Contracts\Link\LinkRepository;
use Illuminate\Support\Str;

class LinkService
{
    /**
     * Генерирует короткую ссылку
     *
     * @return string
     */
    public function getShortLink(): string
    {
        return '/l/' . Str::random(5);
    }

    /**
     * @param string $url
     * @return bool
     */
    public function create(string $url): bool
    {
        /** @var LinkRepository $linkRepository */
        $linkRepository = app(LinkRepository::class);
        $isBaseLinkSet = $linkRepository->getByBaseLink($url);
        if ($isBaseLinkSet) {
            return true;
        }
        $shortLink = $this->getShortLink();
        $isResultLinkSet = $linkRepository->getByResultLink($shortLink);
        if (!$isResultLinkSet) {
            /** @var LinkData $link */
            $link = app(LinkData::class);
            $link->setBaseLink($url);
            $link->setResultLink($shortLink);
            return $link->store();
        } else {
            $this->create($url);
        }

        return false;
    }
}
