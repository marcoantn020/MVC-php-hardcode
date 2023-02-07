<?php

namespace app\classes;

use app\interfaces\ControllerInterface;

class BlockNoReason
{
    public static function block(ControllerInterface $controller, array $blockMethods)
    {
        $methodToBlock = Block::getMethodToBlock($controller, $blockMethods);

        if($methodToBlock) {
            BlockPostRequest::block();
            return redirect("/");
        }
    }
}