<?php

namespace Source\Models\Projects;

class Project extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("projects", ["id"], ["name", "opportunities_id", "status", "version"]);
    }
    /**
     * @return bool
     */
    public function save(): bool
    {

        /** Project Update */
        if (!empty($this->id)) {
            $projectId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$projectId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Project Create */
        if (empty($this->id)) {

            $projectId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($projectId))->data();
        return true;
    }

}