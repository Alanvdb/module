<?php declare(strict_types=1);

namespace AlanVdb\Module\Common;

use AlanVdb\Module\TagEntity;

trait HasTagEntities
{
    protected array $tags;

    public function getTags() : array
    {
        return $this->tags;
    }

    public function setTags(array $tags) : self
    {
        foreach ($tags as $tag) {
            if (!$tag instanceof TagEntity) {
                throw new \InvalidArgumentException('$tags must be an array of TagEntity.');
            }
        }
        $this->tags = $tags;
        return $this;
    }
}
