<?php declare(strict_types=1);

namespace AlanVdb\Module\Entity\Exception;

use AlanVdb\Module\Entity\Definition\EntityExceptionInterface;
use RuntimeException;

class AttributeNotFound
    extends    RuntimeException
    implements EntityExceptionInterface
{}
