<?php

namespace Source\Models\Projects;

class ProjectEvents extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("projects_events", ["id"], ["event_id", "project_id"]);
    }
    /**
     * @return bool
     */
    public function save(): bool
    {

        /** Project Update */
        if (!empty($this->id)) {
            $projectEventId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$projectEventId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** Project Create */
        if (empty($this->id)) {

            $projectEventId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }
        }

        $this->data = ($this->findById($projectEventId))->data();
        return true;
    }
}