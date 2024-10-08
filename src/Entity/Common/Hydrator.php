<?php declare(strict_types=1);

namespace AlanVdb\Module\Entity\Common;

trait Hydrator
{
    public function hydrate(array $attributes) : self
    {
        foreach ($attributes as $attrName => $attrValue) {
            $this->$attrName = $attrValue;
        }
        return $this;
    }
}