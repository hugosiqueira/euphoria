<?php

namespace Source\Models;

use Source\Core\Model;

/**
 * Class Role - Função do Usuário
 */
class Role extends Model
{
    /**
     * Role Constructor
     */
    public function __construct()
    {
        parent::__construct("roles", ["id"], ["name"]);
    }

    /**
     * @param int
     * @return string
     */
    public function findRole(int $id)
    {
        return parent::find("id=:id", "id={$id}", "name");
    }


}