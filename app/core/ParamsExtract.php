<?php

namespace app\core;

class ParamsExtract
{
    public static function extract($sliceIndexStartFRom)
    {
        $uri = Uri::uri();
        $contUri = count($uri);
        return array_slice($uri, $sliceIndexStartFRom, $contUri);
    }
}