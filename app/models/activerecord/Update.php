<?php

namespace app\models\activerecord;


use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use app\models\connection\Connection;

class Update implements ActiveRecordExecuteInterface
{

    private string $field;
    private $value;

    public function __construct(string $field, $value)
    {
        $this->field = $field;
        $this->value = $value;
    }


    public function execute(ActiveRecordInterface $activeRecord)
    {
        try {
            $query = $this->createQuery($activeRecord);

            $connect = Connection::connect();

            $attributes = array_merge($activeRecord->getAttributes(), [
                $this->field => $this->value
            ]);

            $prepare = $connect->prepare($query);
            $prepare->execute($attributes);
            return $prepare->rowCount();

        } catch (\Exception $e) {
            formatException($e);
        }
    }


    private function createQuery(ActiveRecordInterface $activeRecord): string
    {
        if(array_key_exists("id", $activeRecord->getAttributes())) {
            throw new \RuntimeException("Property [id] cannot be added to properties, use constructor to pass update parameter");
        }

        // "UPDATE SET user lastName = :lastName, firstName = :firstname WHERE id = :id"
        $sql = "UPDATE {$activeRecord->getTable()} SET ";

        foreach ($activeRecord->getAttributes() as $key => $value) {
            $sql .= "{$key} = :{$key},";
        }

        $sql = rtrim($sql, ",");

        $sql .= " WHERE {$this->field} = :{$this->field}";
        return $sql;
    }
}