<?php

namespace Source\Models\Opportunities;
use Source\Core\Model;

class Opportunity extends Model
{
    public function __construct()
    {
        parent::__construct("opportunities", ["id"], ["name", "class_id"]);
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Nome da oportunidade é obrigatório.");
            return false;
        }

        /** Opportunity Update */
        if (!empty($this->id)) {
            $opportunityId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$opportunityId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Opportunity Create */
        if (empty($this->id)) {

            $opportunityId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($opportunityId))->data();
        return true;
    }
}