<?php

namespace Source\Models;

class Event extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("event", ["id"], ["name"]);
    }

    /**
     * @param string $name
     * @return Event
     */
    public function bootstrap(
        string $name
    ): Event {
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

        /** Event Update */
        if (!empty($this->id)) {
            $eventId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$eventId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Event Create */
        if (empty($this->id)) {
            if ($this->find("name = :n", "n={$this->name}", "id")->fetch()) {
                $this->message->warning("O evento informado já está cadastrado");
                return false;
            }

            $eventId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }

        }
        $this->data = ($this->findById($eventId))->data();

        return true;
    }
}