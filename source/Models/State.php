<?php

namespace Source\Models;

class State extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("states", ["id"], ["name", "uf"]);
    }

    /**
     * @param string $name
     * @param string $uf
     * @return State
     */
    public function bootstrap(
        string $name,
        string $uf
    ): State {
        $this->name = $name;
        $this->uf =$uf;
        return $this;
    }

}