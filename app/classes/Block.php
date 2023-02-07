<?php

namespace app\classes;

use app\core\MethodExtract;
use app\interfaces\ControllerInterface;

class Block
{
    public static function getMethodToBlock(ControllerInterface $controller, array $blockMethods): bool
    {
        $methods = get_class_methods($controller);

        [ $actualMethod ] = MethodExtract::extract($controller);

        $block = false;

        foreach ($methods as $method) {
            if(in_array($method, $blockMethods, true) && ($method === $actualMethod)) {
                $block = true;
            }
        }
        return $block;
    }
}