<?php

namespace app\classes;

use app\interfaces\ControllerInterface;

class BlockNotLogged
{
    public static function block(ControllerInterface $controller, array $blockMethods)
    {
        $methodToBlock = Block::getMethodToBlock($controller, $blockMethods);

        if(!isset($_SESSION["user"]) && $methodToBlock) {
            BlockPostRequest::block();
            return redirect("/");
        }
    }
}