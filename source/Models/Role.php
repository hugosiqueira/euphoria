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

    /**
     * @param string $name
     * @return Role
     */
    public function bootstrap(
        string $name
    ): Role {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Nome é obrigatório");
            return false;
        }

        /** Role Update */
        if (!empty($this->id)) {
            $roleId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$roleId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Role Create */
        if (empty($this->id)) {
            if ($this->find("name = :n", "n={$this->name}", "id")->fetch()) {
                $this->message->warning("O cargo informado já está cadastrado");
                return false;
            }

            $roleId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }

        }
        $this->data = ($this->findById($roleId))->data();

        return true;
    }


}