<?php declare(strict_types=1);

namespace AlanVdb\Module\Common;

use AlanVdb\Module\ReleaseEntity;

trait HasReleaseEntities
{
    protected array $releases;

    public function getReleases() : array
    {
        return $this->releases;
    }

    public function setReleases(array $releases) : self
    {
        foreach ($releases as $release) {
            if (!$release instanceof ReleaseEntity) {
                throw new \InvalidArgumentException('$releases must be an array of ReleaseEntity.');
            }
        }
        $this->releases = $releases;
        return $this;
    }
}
