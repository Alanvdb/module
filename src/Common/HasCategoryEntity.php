<?php declare(strict_types=1);

namespace AlanVdb\Module\Common;

use AlanVdb\Module\CategoryEntity;

trait HasCategoryEntity
{
    protected ?CategoryEntity $category = null;

    public function getCategory() : ?CategoryEntity
    {
        return $this->category;
    }

    public function setCategory(?CategoryEntity $category) : self
    {
        $this->category = $category;
        return $this;
    }
}
