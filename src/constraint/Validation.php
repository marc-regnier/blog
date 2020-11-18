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
        else if ($name === 'category')
        {
            $categoryValidation = new CommentValidation();
            $errors = $categoryValidation->check($data);
            return $errors;
        }
        else if ($name === 'comment')
        {
            $commentValidation = new CommentValidation();
            $errors = $commentValidation->check($data);
            return $errors;
        }
        else if ($name === 'user') {
            $userValidation = new UserValidation();
            $errors = $userValidation->check($data);
            return $errors;
        }
    }
}