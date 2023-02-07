<?php


use app\interfaces\ActiveRecordExecuteInterface;
use app\interfaces\ActiveRecordInterface;
use app\models\connection\Connection;

class Delete implements ActiveRecordExecuteInterface
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

            $attributes = [$this->field => $this->value];

            $prepare = $connect->prepare($query);
            $prepare->execute($attributes);
            return $prepare->rowCount();

        } catch (\Exception $e) {
            formatException($e);
        }
    }


    private function createQuery(ActiveRecordInterface $activeRecord): string
    {
        if($activeRecord->getAttributes()) {
            throw new \RuntimeException("To exclude it is not necessary to pass arguments to properties");
        }
        // "DELETE FROM user WHERE id = :id";
        $sql = "DELETE FROM {$activeRecord->getTable()} WHERE ";

        $sql .= "{$this->field} = :{$this->field}";

        return $sql;
    }
}