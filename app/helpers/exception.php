<?php

function formatException(Exception $e)
{
    $format = "<p style='background-color: black; color: orangered; padding: 2px'>Erro no arquivo <strong>" . $e->getFile() . "</strong> <br> 
    Na linha <strong> " . $e->getLine() . " </strong> <br> 
    Mensagem: <strong><i> " . $e->getMessage() . " </i></strong></p>";
    echo $format;
    die();
}