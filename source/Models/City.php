<?php

namespace Source\Models;

class City extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("cities", ["id"], ["name", "uf"]);
    }

    /**
     * @param string $name
     * @param string $uf
     * @return City
     */
    public function bootstrap(
        string $name,
        string $uf
    ): State {
        $this->name = $name;
        $this->uf =$uf;
        return $this;
    }

    public function findByState(int $state, string $columns = "*"): ?City
    {
        $find = $this->find("states_id = :s", "s={$state}", $columns);
        return $find->fetch();
    }
}