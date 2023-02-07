<?php

namespace app\models\activerecord;


use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use app\models\connection\Connection;

class Insert implements ActiveRecordExecuteInterface
{

    public function execute(ActiveRecordInterface $activeRecord)
    {
        try {
            $query = $this->createQuery($activeRecord);

            $connect = Connection::connect();

            return $connect->prepare($query)->execute($activeRecord->getAttributes());

        } catch (\Exception $e) {
            formatException($e);
        }
    }


    private function createQuery(ActiveRecordInterface $activeRecord): string
    {
        // "INSERT user (firstName, lastName) VALUES (:firstName,:lastName)";
        $sql = "INSERT {$activeRecord->getTable()} (";

        $sql .= implode(",", array_keys($activeRecord->getAttributes()));

        $sql .= ") VALUES (:";

        $sql .= implode(",:", array_keys($activeRecord->getAttributes()));

        $sql = rtrim($sql, ",:");

        $sql .= ");";

        return $sql;
    }
}