<?php

namespace Source\Models;

class School extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("school", ["id"], ["name", "state_id", "city_id"]);
    }

    /**
     * @param string $name
     * @param string $address
     * @param string $sigla
     * @param string $number
     * @param integer $states_id
     * @param integer $cities_id
     * @return School
     */
    public function bootstrap(
        string $name,
        string $address,
        string $number,
        string $sigla,
        int $states_id,
        int $cities_id


    ): School {
        $this->name = $name;
        $this->sigla = $sigla;
        $this->address = $address;
        $this->number = $number;
        $this->states_id = $states_id;
        $this->cities_id = $cities_id;
        return $this;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Nome, estado e cidade são obrigatórios");
            return false;
        }

        /** School Update */
        if (!empty($this->id)) {
            $schoolId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$schoolId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** School Create */
        if (empty($this->id)) {
            if ($this->find("name = :n AND cities_id = :c", "n={$this->name}&c={$this->cities_id}", "id")->fetch()) {
                $this->message->warning("A instituição informada já está cadastrado");
                return false;
            }

            $schoolId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }

        }
        $this->data = ($this->findById($schoolId))->data();

        return true;
    }

}