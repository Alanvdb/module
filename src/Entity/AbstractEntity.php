<?php declare(strict_types=1);

namespace AlanVdb\Module\Entity;

use AlanVdb\Module\Entity\Exception\InvalidFillables;
use AlanVdb\Module\Entity\Exception\AttributeNotFound;

/**
 * Abstract class that represents an entity with fillable attributes and validation capabilities.
 */
abstract class AbstractEntity
{
    /**
     * @var array<string, mixed> An array of attributes that can be filled.
     */
    protected array $fillables = [];

    /**
     * @var array<string, ValidatorInterface[]> An array of validators associated with fillable attributes.
     */
    protected array $validators = [];

    /**
     * @var array<string, string[]> An array of error messages indexed by attribute names.
     */
    protected array $errors = [];

    /**
     * AbstractEntity constructor.
     * 
     * @throws InvalidFillables If no fillables are provided in the setup() method.
     */
    public function __construct()
    {
        $this->setup();

        if (empty($this->fillables)) {
            throw new InvalidFillables('No fillables provided in setup() method.');
        }
    }

    /**
     * Adds a fillable attribute with its associated validators.
     *
     * @param string $attrName The name of the attribute to add.
     * @param ValidatorInterface ...$validators The validators to apply to the attribute.
     * 
     * @return void
     * 
     * @throws InvalidFillables If the attribute name is empty or already exists.
     */
    protected function addFillable(string $attrName, ValidatorInterface ...$validators) : void
    {
        if (empty($attrName)) {
            throw new InvalidFillables('Provided fillable name is empty.');
        }
        if (array_key_exists($attrName, $this->fillables)) {
            throw new InvalidFillables('Provided fillable name already exists.');
        }
        $this->fillables[$attrName]  = null;
        $this->validators[$attrName] = $validators;
    }

    /**
     * Magic method to get the value of a fillable attribute.
     *
     * @param string $attribute The name of the attribute to get.
     * 
     * @return mixed The value of the attribute.
     * 
     * @throws AttributeNotFound If the attribute is not found.
     */
    public function __get(string $attribute) : mixed
    {
        if (array_key_exists($attribute, $this->fillables)) {
            return $this->fillables[$attribute];
        } else {
            $method = 'get' . ucfirst($attribute);

            if (method_exists($this, $method)) {
                return $this->$method();
            }
        }
        $class = $this::class;
        throw new AttributeNotFound("Attribute '$attribute' not found for class '$class'.");
    }

    public function __set(string $attribute, mixed $value) : void
    {
        if (array_key_exists($attribute, $this->fillables)) {
            $this->fillables[$attribute] = $value;
        } else {
            $class = $this::class;
            throw new AttributeNotFound("Attribute '$attribute' not found for class '$class'.");
        }
    }

    /**
     * Validates the entity's attributes using the associated validators.
     *
     * @return bool True if all attributes are valid, false otherwise.
     */
    public function isValid() : bool
    {
        $isValid = true;

        foreach ($this->validators as $attribute => $validators) {

            foreach ($validators as $validator) {

                if (!$validator->isValid($this->fillables[$attribute])) {

                    if (!array_key_exists($attribute, $this->errors)) {
                        $this->errors[$attribute] = [];
                    }
                    if ($isValid) {
                        $isValid = false;
                    }
                    $this->errors[$attribute][] = $validator->getErrorMessage();
                }
            }
        } 
        return $isValid;
    }

    /**
     * Gets the validation errors for the entity.
     *
     * @return array<string, string[]> An array of error messages indexed by attribute names.
     */
    public function getErrors() : array
    {
        return $this->errors;
    }

    /**
     * Setup method to be implemented by subclasses to define fillable attributes and validators.
     * 
     * @return void
     */
    abstract protected function setup() : void;
}
