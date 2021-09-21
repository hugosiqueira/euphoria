<?php

namespace Source\Models;

class School extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("school", ["id"], ["name", "address"]);
    }

    /**
     * @param string $name
     * @param integer $status
     * @return School
     */
    public function bootstrap(
        string $name,
        string $address

    ): School {
        $this->name = $name;
        $this->address = $address;
        return $this;
    }

}