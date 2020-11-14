<?php

namespace App\src\constraint;


class Validation
{
    public function validate($data, $name)
    {
        if($name === 'post') {
            $postValidation = new PostValidation();
            $errors = $postValidation->check($data);
            return $errors;
        }
    }
}