<?php declare(strict_types=1);

namespace AlanVdb\Module;

use AlanVdb\Module\Common\HasImageEntities;

/**
 * parent category can be defined with attribute PostEntity::$category
 */
class ImageCategory extends CategoryEntity
{
    use HasImageEntities;
}
