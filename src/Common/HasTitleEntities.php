<?php declare(strict_types=1);

namespace AlanVdb\Module\Common;

use AlanVdb\Module\TitleEntity;

trait HasTitleEntities
{
    protected array $titles;

    public function getTitles() : array
    {
        return $this->titles;
    }

    public function setTitles(array $titles) : self
    {
        foreach ($titles as $title) {
            if (!$title instanceof TitleEntity) {
                throw new \InvalidArgumentException('$titles must be an array of TitleEntity.');
            }
        }
        $this->titles = $titles;
        return $this;
    }
}
