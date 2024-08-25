<?php declare(strict_types=1);

namespace AlanVdb\Module\Common;

trait HasPath
{
    protected string $path = '';

    public function getPath() : string
    {
        return $this->path;
    }

    public function setPath(string $path) : self
    {
        $this->path = $path;
        return $this;
    }
}