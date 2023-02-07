<?php

namespace app\models\activerecord;

use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use app\models\connection\Connection;

class FindBy implements ActiveRecordExecuteInterface
{

    private string $fields;
    private string $field;
    private $value;

    public function __construct(string $field, $value, string $fields = "*")
    {
        $this->fields = $fields;
        $this->field = $field;
        $this->value = $value;
    }

    public function execute(ActiveRecordInterface $activeRecord)
    {
        try{
            $query = $this->createQuery($activeRecord);

            $connect = Connection::connect();

            $attributes =  [$this->field => $this->value];

            $prepare = $connect->prepare($query);
            $prepare->execute($attributes);
            return $prepare->fetch();

        } catch (\Exception $e) {
            formatException($e);
        }
    }


    private function createQuery(ActiveRecordInterface $activeRecord): string
    {
        if($activeRecord->getAttributes()) {
            throw new \RuntimeException("To exclude it is not necessary to pass arguments to properties");
        }
        // "SELECT * FROM user WHERE id = :id";
        return "SELECT {$this->fields} FROM {$activeRecord->getTable()} WHERE {$this->field} = :{$this->field}";
    }
}