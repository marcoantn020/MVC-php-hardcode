<?php

namespace app\interfaces;

interface ActiveRecordInterface
{
    public function execute(ActiveRecordExecuteInterface $activeRecordExecute);
    public function getTable();
    public function getAttributes();
    public function __set($name, $value);
    public function __get($name);
    public function __isset($name);
}