<?php

namespace App\src\constraint;
use App\config\Parameter;

class PostValidation extends Validation
{
    private $errors = [];
    private $constraint;

    public function __construct()
    {
        $this->constraint = new Constraint();
    }

    public function check(Parameter $category)
    {
        foreach ($category->all() as $key => $value) {
            $this->checkField($key, $value);
        }
        return $this->errors;
    }

    private function checkField($name, $value)
    {
        if($name === 'name') {
            $error = $this->checkTitle($name, $value);
            $this->addError($name, $error);
        }
        elseif ($name === 'slug') {
            $error = $this->checkContent($name, $value);
            $this->addError($name, $error);
        }
    }

    private function addError($name, $error) {
        if($error) {
            $this->errors += [
                $name => $error
            ];
        }
    }

    private function checkTitle($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('name', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('name', $value, 2);
        }
        if($this->constraint->maxLength($name, $value, 255)) {
            return $this->constraint->maxLength('name', $value, 255);
        }
    }

    private function checkContent($name, $value)
    {
        if($this->constraint->notBlank($name, $value)) {
            return $this->constraint->notBlank('slug', $value);
        }
        if($this->constraint->minLength($name, $value, 2)) {
            return $this->constraint->minLength('slug', $value, 2);
        }
    }

}