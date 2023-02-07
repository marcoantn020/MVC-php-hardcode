<?php

function welcome($key): string
{
    if(isset($_SESSION[$key])) {
        $user = $_SESSION[$key];

        return "Bem vindo - {$user->firstName} {$user->lastName} | <a href='/login/destroy'> Logout </a>";
    }

    return  "Visitante";
}