<?php declare(strict_types=1);

namespace AlanVdb\Module\Common;

use AlanVdb\Module\CreatorEntity;

trait HasCreatorEntities
{
    protected array $creators;

    public function getCreators() : array
    {
        return $this->creators;
    }

    public function setCreators(array $creators) : self
    {
        foreach ($creators as $creator) {
            if (!$creator instanceof CreatorEntity) {
                throw new \InvalidArgumentException('$creators must be an array of CreatorEntity.');
            }
        }
        $this->creators = $creators;
        return $this;
    }
}
