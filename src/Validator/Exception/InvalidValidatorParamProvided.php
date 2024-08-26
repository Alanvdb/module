<?php declare(strict_types=1);

namespace AlanVdb\Module\Validator\Exception;

use AlanVdb\Module\Validator\Definition\ValidatorExceptionInterface;
use InvalidArgumentException;

class InvalidValidatorParamProvided
    extends InvalidArgumentException
    implements ValidatorExceptionInterface
{}
