<?php

namespace app\models\activerecord;


use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use app\models\connection\Connection;

class Find implements ActiveRecordExecuteInterface
{
    private string $fields;

    public function __construct(string $fields = "*")
    {
        $this->fields = $fields;
    }

    public function execute(ActiveRecordInterface $activeRecord)
    {
        try{
            $query = $this->createQuery($activeRecord);

            $connect = Connection::connect();

            $prepare = $connect->query($query);
            $prepare->execute();
            return $prepare->fetchAll();

        } catch (\Exception $e) {
            formatException($e);
        }
    }


    private function createQuery(ActiveRecordInterface $activeRecord): string
    {
        if($activeRecord->getAttributes()) {
            throw new \RuntimeException("To exclude it is not necessary to pass arguments to properties");
        }
        // "SELECT * FROM user;";
        return "SELECT {$this->fields} FROM {$activeRecord->getTable()};";
    }
}