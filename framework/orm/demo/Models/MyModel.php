<?php

namespace Layers\Models;

use Sciola\Model;

class MyModel extends Model
{
    private $orm = null;

    public function __construct()
    {
        $this->orm = $this->orm();

        $this->orm->create('demo', [
            'id' => [
            'INT',
            'NOT NULL',
            'PRIMARY KEY'
          ],
            'name' => [
            'VARCHAR(30)',
            'NOT NULL'
          ]
        ]);
    }

    public function insert($name)
    {
        $this->orm->insert('demo', [
          'id' => sizeof($this->orm->select('demo', ['id'])) + 1,
          'name' => $name
        ]);
    }

    public function select()
    {
        return $this->orm->select('demo', ['name']);
    }
}
