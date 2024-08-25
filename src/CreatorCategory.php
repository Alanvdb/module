<?php declare(strict_types=1);

namespace AlanVdb\Module;

use AlanVdb\Module\Common\HasCreatorEntities;

/**
 * parent category can be defined with attribute PostEntity::$category
 */
class CreatorCategory extends CategoryEntity
{
    use HasCreatorEntities;
}
