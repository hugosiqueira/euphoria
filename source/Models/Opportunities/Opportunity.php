<?php

namespace Source\Models\Opportunities;
use Source\Core\Model;

class Opportunity extends Model
{
    public function __construct()
    {
        parent::__construct("opportunities", ["id"], ["name"]);
    }
    /**
     * @param string $email
     * @param string $columns
     * @return mixed|User
     */
    public function findByCommittee($committee_id, string $columns = "*"): ?Opportunity
    {
        $find = $this->find("committee_id = :c", "c={$committee_id}", $columns);
        return $find->fetch();
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
            if ($this->findByCommittee($this->committee_id, "committee_id")) {
                $this->message->warning("A comissão informada já está cadastrada");
                return false;
            }

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