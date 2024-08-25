<?php declare(strict_types=1);

namespace AlanVdb\Module;

use AlanVdb\Module\Common\HasPath;

class ImageEntity extends PostEntity
{
    use HasPath;

    protected string $altText = '';

    public function getAltText() : string 
    {
        return $this->altText;
    }

    public function setAltText(string $altText) : self
    {
        $this->altText = $altText;
    }
}
