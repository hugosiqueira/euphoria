<?php

namespace Source\App\Admin;
use Source\Models\Event;

/**
 *
 */
class Events extends Admin
{
    /**
     * Events constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function event(?array $data): void
    {

        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $eventCreate = new Event();
            $eventCreate->name = $data["name"];
            $eventCreate->created_at = date('Y-m-d H:i:s');

            if (!$eventCreate->save()) {
                $json["message"] = $eventCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Evento cadastrado com sucesso...")->flash();
            $json["redirect"] = url("/admin/config/event/{$eventCreate->id}");
            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $eventUpdate = (new Event())->findById($data["event_id"]);

            if (!$eventUpdate) {
                $this->message->error("Você tentou editar um evento que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/events")]);
                return;
            }

            $eventUpdate->name = (!empty($data["name"]) ? $data["name"] : $eventUpdate->name);

            if (!$eventUpdate->save()) {
                $json["message"] = $eventUpdate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Evento atualizado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $eventDelete = (new Event())->findById($data["event_id"]);

            if (!$eventDelete) {
                $this->message->error("Você tentou deletar um evento que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/events")]);
                return;
            }

            $eventDelete->destroy();

            $this->message->success("O evento foi excluído com sucesso...")->flash();
            echo json_encode(["redirect" => url("/admin/config/events")]);
            return;
        }

        $eventEdit = null;
        if (!empty($data["event_id"])) {
            $eventId = filter_var($data["event_id"], FILTER_VALIDATE_INT);
            $eventEdit = (new Event())->findById($eventId);
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | " . ($eventEdit ? "Perfil de {$eventEdit->name}" : "Novo Evento"),
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/config/event", [
            "app" => "config/event",
            "head" => $head,
            "event" => $eventEdit
        ]);
    }
}