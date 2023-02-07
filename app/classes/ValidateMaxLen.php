<?php

namespace app\classes;

use app\interfaces\ValidateInterface;

class ValidateMaxLen implements ValidateInterface
{
    public function handle($field, $param)
    {
        $string = filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);

        if(strlen($string) > $param) {
            Flash::set($field, 'O campo deve ser maior que ' . $param);
            return false;
        }

        Old::set($field, $string);

        return $string;
    }
}