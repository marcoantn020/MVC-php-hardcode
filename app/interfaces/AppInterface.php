<?php

namespace app\interfaces;

interface AppInterface
{
    public function controller(): string;
    public function methods($controller): string;
    public function params(): array;
}