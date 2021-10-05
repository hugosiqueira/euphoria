<?php

namespace Source\Models;

class Prints extends \Source\Core\Model
{
    /**
     * Prints constructor.
     */
    public function __construct()
    {
        parent::__construct("prints", ["id"], ["footer_id", "header_id", "name"]);
    }

    /**
     * @param string $name
     * @return Prints
     */
    public function bootstrap(
        string $name,
        integer $header_id,
        integer $footer_id
    ): Prints {
        $this->name = $name;
        $this->header_id = $header_id;
        $this->footer_id = $footer_id;
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

        /** Prints Update */
        if (!empty($this->id)) {
            $printsId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$printsId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Prints Create */
        if (empty($this->id)) {
            if ($this->find("name = :n", "n={$this->name}", "id")->fetch()) {
                $this->message->warning("O modelo informado já está cadastrado");
                return false;
            }

            $printsId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }

        }
        $this->data = ($this->findById($printsId))->data();

        return true;
    }
}