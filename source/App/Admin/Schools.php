<?php

namespace Source\App\Admin;
use Source\Models\City;
use Source\Models\School;
use Source\Models\State;

class Schools extends Admin
{
    /**
     * Schools constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function school(?array $data): void
    {
        
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $schoolCreate = new School();
            $schoolCreate->name = $data["name"];
            $schoolCreate->sigla = $data["sigla"];
            $schoolCreate->address = $data["address"];
            $schoolCreate->number = $data["number"];
            $schoolCreate->states_id = $data["states_id"];
            $schoolCreate->cities_id = $data["cities_id"];
            $schoolCreate->created_at = date('Y-m-d H:i:s');

            if (!$schoolCreate->save()) {
                $json["message"] = $schoolCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Instituição cadastrada com sucesso...")->flash();
            $json["redirect"] = url("/admin/config/school/{$schoolCreate->id}");
            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $schoolUpdate = (new School())->findById($data["school_id"]);

            if (!$schoolUpdate) {
                $this->message->error("Você tentou editar uma instituição que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/schools")]);
                return;
            }

            $schoolUpdate->name = (!empty($data["name"]) ? $data["name"] : $schoolUpdate->name);
            $schoolUpdate->sigla = (!empty($data["sigla"]) ? $data["sigla"] : $schoolUpdate->sigla);
            $schoolUpdate->address = (!empty($data["address"]) ? $data["address"] : $schoolUpdate->address);
            $schoolUpdate->number = (!empty($data["number"]) ? $data["number"] : $schoolUpdate->number);
            $schoolUpdate->states_id = (!empty($data["states_id"]) ? $data["states_id"] : $schoolUpdate->states_id);
            $schoolUpdate->cities_id = (!empty($data["cities_id"]) ? $data["cities_id"] : $schoolUpdate->cities_id);

            if (!$schoolUpdate->save()) {
                $json["message"] = $schoolUpdate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Instituição atualizada com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $schoolDelete = (new School())->findById($data["school_id"]);

            if (!$schoolDelete) {
                $this->message->error("Você tentou deletar uma instituição que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/schools")]);
                return;
            }

            $schoolDelete->destroy();

            $this->message->success("A instituição foi excluída com sucesso...")->flash();
            echo json_encode(["redirect" => url("/admin/config/schools")]);
            return;
        }

        $schoolEdit = null;
        if (!empty($data["school_id"])) {
            $schoolId = filter_var($data["school_id"], FILTER_VALIDATE_INT);
            $schoolEdit = (new School())->findById($schoolId);
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | " . ($schoolEdit ? "Perfil de {$schoolEdit->name}" : "Novo Usuário"),
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/config/school", [
            "app" => "config/school",
            "head" => $head,
            "school" => $schoolEdit,
            "states" => (new State())->find()->order('name')->fetch('all'),
            "cities" => (new City())->find()->order('name')->fetch('all')
        ]);
    }

}