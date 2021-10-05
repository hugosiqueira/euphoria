<?php

namespace Source\Models;

class Fee extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("fees", ["id"], ["name"]);
    }

    /**
     * @param string $name
     * @return Fee
     */
    public function bootstrap(
        string $name
    ): Fee {
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

        /** Fee Update */
        if (!empty($this->id)) {
            $feeId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$feeId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Fee Create */
        if (empty($this->id)) {
            if ($this->find("name = :n", "n={$this->name}", "id")->fetch()) {
                $this->message->warning("O feeo informado já está cadastrado");
                return false;
            }

            $feeId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }

        }
        $this->data = ($this->findById($feeId))->data();

        return true;
    }
}