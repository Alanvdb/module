<?php declare(strict_types=1);

namespace AlanVdb\Module;

use AlanVdb\Module\Common\HasTitleEntities;

/**
 * parent category can be defined with attribute PostEntity::$category
 */
class TitleCategory extends CategoryEntity
{
    use HasTitleEntities;
}
