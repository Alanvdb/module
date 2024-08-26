<?php declare(strict_types=1);

namespace AlanVdb\Module\Entity\Common;

trait Hydrator
{
    #[\Comment('Hydrate object with an associative array of attributes if the setter exists.')]
    public function hydrate(array $attributes)
    {
        foreach ($attributes as $attrName => $attrValue) {
            $method = 'set' . ucfirst($attrName);

            if (method_exists($this, $method)) {
                $this->$method($attrValue);
            }
        }
    }
}