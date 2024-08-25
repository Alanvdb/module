<?php declare(strict_types=1);

namespace AlanVdb\Module;

use AlanVdb\Module\Common\HasIncompleteReleaseDate;

class ReleaseEntity extends PostEntity
{
    use HasIncompleteReleaseDate;
}
