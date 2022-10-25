<?php

namespace App\Exceptions;

use Exception;

class ValidationException extends Exception
{
    //
    public $errors;

    public function __construct($errors = [], $message = '', $code = 0)
    {
        $this->errors = $errors;

        parent::__construct($message, $code);
    }

    public function getValidationErrors()
    {
        return $this->errors;
    }
}
