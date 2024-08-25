<?php declare(strict_types=1);

namespace AlanVdb\Module;

use AlanVdb\Module\Common\HasWebResourceEntities;

/**
 * parent category can be defined with attribute PostEntity::$category
 */
class WebResourceCategory extends CategoryEntity
{
    use HasWebResourceEntities;
}
