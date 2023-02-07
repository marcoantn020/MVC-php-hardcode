<?php

namespace app\core;


use app\interfaces\AppInterface;

class AppExtract implements AppInterface
{
    private int $sliceIndexStartFRom;

    public function controller(): string
    {
        return ControllerExtract::extract();
    }

    public function methods($controller): string
    {
        [$method, $sliceIndexStartFrom] = MethodExtract::extract($controller);
        $this->sliceIndexStartFRom = $sliceIndexStartFrom;
        return $method;
    }

    public function params(): array
    {
        return ParamsExtract::extract($this->sliceIndexStartFRom);
    }
}