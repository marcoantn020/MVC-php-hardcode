<?php

namespace app\classes;

class BlockPostRequest
{
    public static function block()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "Voce não pode fazer isso | <a href='/'> Home </a>";
            die();
        }
    }
}