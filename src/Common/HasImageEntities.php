<?php declare(strict_types=1);

namespace AlanVdb\Module\Common;

use AlanVdb\Module\ImageEntity;

trait HasImageEntities
{
    protected array $images;

    public function getImages() : array
    {
        return $this->images;
    }

    public function setImages(array $images) : self
    {
        foreach ($images as $image) {
            if (!$image instanceof ImageEntity) {
                throw new \InvalidArgumentException('$images must be an array of ImageEntity.');
            }
        }
        $this->images = $images;
        return $this;
    }
}
