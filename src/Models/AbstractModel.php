<?php

namespace App\Models;

abstract class AbstractModel
{

    protected $table;
    protected $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertData(array $data, $id)
    {
        $valuesColumn = [];
        $valuesData   = [];

        foreach ($data as $key => $value) {
            $valuesColumn[$key] = ':'.$key;
            $valuesData[$key]   = $value;
        }

        $this->db->insert($this->table)
            ->values($valuesColumn)
            ->setParameters($valuesData)
            ->execute();
    }

    public function getAll()
    {
        $this->db->select('*')->from($this->table);
        $query = $this->db->execute();

        return $query->fetchAll();
    }

    public function getSelect(array $data, $id)
    {
        $valuesColumn = [];

        $this->db->select($valuesColumn)->from($this->table);
        $query = $this->db->execute();

        return $query->fetchAll();
    }

    public function find($id)
    {
        $this->db->select('*')->from($this->table)
            ->where('id ='. $id);
        $query = $this->db->execute();

        return $query->fetchAll();
    }

    public function findSelect(array $data, $id)
    {
        $valuesColumn = [];

        $this->db->select($valuesColumn)->from($this->table)
            ->where('id', $id);
        $query = $this->db->execute();

        return $query->fetch();
    }

}
