<?php

namespace validators;

use models\ValidationError;

class UrlValidator extends AbstractValidator
{
    /**
     * @inheritdoc
     */
    protected function validateValue($value): array
    {
        $errors = [];

        if (filter_var($value, FILTER_VALIDATE_URL) === false) {
            $errors[] = new ValidationError(['message' => 'Incorrect url']);
        }

        return $errors;
    }
}