<?php declare(strict_types=1);

namespace AlanVdb\Module\Validator\Definition;

interface ValidatorInterface
{
    public function isValid($value) : bool;

    public function getErrorMessage() : string;
}