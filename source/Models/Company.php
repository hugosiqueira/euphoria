<?php

namespace Source\Models;

class Company extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("companies", ["id"], ["name", "cities_id"]);
    }

    /**
     * @param string $name
     * @param string $address
     * @param string $email
     * @param string $celular
     * @param integer $cities_id
     * @return Company
     */
    public function bootstrap(
        string $name,
        string $address,
        string $email,
        string $celular,
        int $cities_id


    ): Company {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->celular = $celular;
        $this->cities_id = $cities_id;
        return $this;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Nome e cidade são obrigatórios");
            return false;
        }

        /** Company Update */
        if (!empty($this->id)) {
            $companyId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$companyId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Company Create */
        if (empty($this->id)) {
            if ($this->find("name = :n AND cities_id = :c", "n={$this->name}&c={$this->cities_id}", "id")->fetch()) {
                $this->message->warning("A instituição informada já está cadastrado");
                return false;
            }

            $companyId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }

        }
        $this->data = ($this->findById($companyId))->data();

        return true;
    }
}