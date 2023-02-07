<?php

namespace app\models\activerecord;


use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;

abstract class ActiveRecord implements ActiveRecordInterface
{
    protected ?string $table = null;
    protected array $attributes = [];

    public function __construct()
    {
        if(!$this->table) {
            $this->table = strtolower((new \ReflectionClass($this))->getShortName());
        }
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function getTable(): string
    {
        return $this->table;
    }

    public function __set($name, $value): void
    {
        $this->attributes[$name] = $value;
    }

    public function __get($name)
    {
        return $this->attributes[$name];
    }

    public function __isset($name)
    {
       if(isset($this->attributes[$name])) {
           throw new \RuntimeException("Property {$name} not exist." );
       }
    }


     public function execute(ActiveRecordExecuteInterface $activeRecordExecute)
     {
         return $activeRecordExecute->execute($this);
     }
 }