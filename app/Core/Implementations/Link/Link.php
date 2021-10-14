<?php

namespace App\Core\Implementations\Link;

use App\Core\Contracts\Link\LinkData;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $base_link
 * @property string $result_link
 */
class Link extends Model implements LinkData
{
    protected $fillable = [
        'base_link',
        'result_link'
    ];

    /**
     * Идентификатор
     *
     * @return int
     */
    public function id(): int
    {
        return $this->id;
    }

    /**
     * Длинная ссылка
     *
     * @return string
     */
    public function baseLink(): string
    {
        return $this->base_link;
    }

    /**
     * Короткая ссылка
     *
     * @return string
     */
    public function resultLink(): string
    {
        return $this->result_link;
    }

    /**
     * Установить длинную ссылку
     *
     * @param string $baseLink
     * @return string
     */
    public function setBaseLink(string $baseLink): string
    {
        $this->base_link = $baseLink;
        return $this->base_link;
    }

    /**
     * Установить короткую ссылку
     *
     * @param string $resultLink
     * @return string
     */
    public function setResultLink(string $resultLink): string
    {
        $this->result_link = $resultLink;
        return $this->result_link;
    }

    public function store(): bool
    {
        return $this->save();
    }
}
