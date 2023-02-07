<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateEmail implements ValidateInterface
{
    public function handle($field, $param)
    {
        $isEmail = filter_input(INPUT_POST, $field, FILTER_VALIDATE_EMAIL);

        if(!$isEmail) {
            Flash::set($field, 'Informe um email valido');
            return false;
        }

        $email =  filter_input(INPUT_POST, $field, FILTER_SANITIZE_EMAIL);

        Old::set($field, $email);

        return $email;
    }
}