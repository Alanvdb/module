<?php declare(strict_types=1);

namespace AlanVdb\Module\Common;

trait HasUrl
{
    protected string $url = '';

    public function getUrl() : string
    {
        return $this->url;
    }

    public function setUrl(string $url) : self
    {
        $this->url = $url;
        return $this;
    }
}