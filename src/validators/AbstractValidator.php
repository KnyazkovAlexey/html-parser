<?php

namespace validators;

use base\BaseObject;
use models\ValidationError;

abstract class AbstractValidator extends BaseObject
{
    /**
     * @var ValidationError[]
     */
    protected array $validationErrors = [];

    /**
     * @param mixed $value
     * @return ValidationError[]
     */
    abstract protected function validateValue($value): array;

    /**
     * @param mixed $value
     * @return bool
     */
    public function validate($value): bool
    {
        $this->validationErrors = static::validateValue($value);

        return empty($this->validationErrors);
    }

    /**
     * @return ValidationError[]
     */
    public function getErrors(): array
    {
        return $this->validationErrors;
    }

    /**
     * @return string|null
     */
    public function getFirstErrorMessage(): ?string
    {
        if (empty($this->validationErrors)) {
            return null;
        }

        return $this->validationErrors[0]->message;
    }
}