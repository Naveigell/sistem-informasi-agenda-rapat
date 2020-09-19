<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;

class ValidatorExceptionRequest extends ValidationException {
    public function with(string $key, string $value = null) {

        redirect('/');

        return $this;
    }
}
