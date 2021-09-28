<?php

namespace Source\Models;

class Course extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("course", ["id"], ["name"]);
    }

    /**
     * @param string $name
     * @return Course
     */
    public function bootstrap(
        string $name
    ): Course {
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

        /** Course Update */
        if (!empty($this->id)) {
            $courseId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$courseId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Course Create */
        if (empty($this->id)) {
            if ($this->find("name = :n", "n={$this->name}", "id")->fetch()) {
                $this->message->warning("O curso informado já está cadastrado");
                return false;
            }

            $courseId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }

        }
        $this->data = ($this->findById($courseId))->data();

        return true;
    }
}