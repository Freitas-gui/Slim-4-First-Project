<?php

namespace app\traits;

trait Update{
    public function update(array $updateFieldsAndValues)
    {
        $fields = $updateFieldsAndValues['fields'];
        $where = $updateFieldsAndValues['where'];

        $updateFields = '';

        foreach (array_keys($fields) as $field) {
            $updateFields .= "{$field} = :{$field},";
        }

        $updateFields = rtrim($updateFields, ',');
        $whereUpdate = array_keys($where);
        $bind = array_merge($fields, $where);
        $sql = sprintf('update %s set %s where %s', $this->table, $updateFields, "{$whereUpdate[0]} = :$whereUpdate[0]");

        try {
            $preparedSql = $this->connection->prepare($sql);
            $preparedSql->execute($bind);
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}