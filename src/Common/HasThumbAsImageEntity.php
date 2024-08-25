<?php declare(strict_types=1);

namespace AlanVdb\Module\Common;

use AlanVdb\Module\ImageEntity;

trait HasThumbAsImageEntity
{
    protected ?ImageEntity $thumb = null;

    public function getThumb() : ?ImageEntity
    {
        return $this->thumb;
    }

    public function setThumb(?ImageEntity $thumb) : self
    {
        $this->thumb = $thumb;
        return $this;
    }
}
