<?php

namespace application\lib;

use PDO;

class Database
{
    protected $db;

    public function __construct() {
        $config = require 'application/config/db.php';

        $this->db = new PDO(
            'mysql:host=' . $config['host'] . ';dbname=' . $config['dbName'] . ';charset=utf8',
            $config['dbUser'],
            $config['dbPassword']
        );
    }

    /**
     * Підготовлений sql запит із фільтрацією на sql ін'єкцію
     * @param $sql
     * @param array $params
     * @return bool|\PDOStatement
     */
    public function query($sql, $params = []){
        $statement = $this->db->prepare($sql);
        if(!empty($statement)){
            foreach ($params as $key => $val){ // бере параметри у sql запиті що стоять після ':' і підставляє відповідні їм параметри із масиву $params
                $statement->bindValue(':' . $key, $val);
            }
        }
        $statement->execute();
        return $statement;
    }

    public function row($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchAll(PDO::FETCH_OBJ);
    }

    public function column($sql, $params = []){
        $result = $this->query($sql, $params);
        return $result->fetchColumn();
    }
}