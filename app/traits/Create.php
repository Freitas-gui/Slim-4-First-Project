<?php

namespace app\traits;

use PDOException;

trait Create{

    public function create($createFieldsAndValues)
    {
        try {
            $keys = array_keys($createFieldsAndValues);

            $sql = 'insert into ' . $this->table . ' (' . implode(',', $keys) . ') ';
            $sql .= 'values(:' . implode(',:', $keys) . ')';

            $preparedSql = $this->connection->prepare($sql);
            return $preparedSql->execute($createFieldsAndValues);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
    
}