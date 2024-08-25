<?php declare(strict_types=1);

namespace AlanVdb\Module\Common;

use AlanVdb\Module\webResourceEntity;

trait HasWebResourceEntities
{
    protected array $webResources;

    public function getWebResources() : array
    {
        return $this->webResources;
    }

    public function setWebResources(array $webResources) : self
    {
        foreach ($webResources as $webResource) {
            if (!$webResource instanceof WebResourceEntity) {
                throw new \InvalidArgumentException('$webResources must be an array of WebResourceEntity.');
            }
        }
        $this->webResources = $webResources;
        return $this;
    }
}
