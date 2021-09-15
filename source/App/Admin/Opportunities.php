<?php

namespace Source\App\Admin;
use Source\Models\Opportunities\Opportunity;

/**
 *
 */
class Opportunities extends Admin
{
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @param array|null $data
     */
    public function home(?array $data): void
    {
        //search redirect

        $opportunities = (new Opportunity())
            ->find("", "","opportunities.id, CONCAT(a.first_name, ' ', a.last_name) as consult, CONCAT(b.first_name, ' ', b.last_name) as supervisor, opportunities.version, opportunities.created_at, opportunities.update_at, f.name as city, e.name as company, opportunities.status" )
            ->join("users a", "opportunities.consult_users_id", "=", "a.id", "LEFT")
            ->join("users b", "opportunities.supervisor_users_id", "=", "b.id", "LEFT")
            ->join("committee c", "opportunities.committee_id", "=", "c.id","LEFT" )
            ->join("class d", "c.class_id", "=", "d.id","LEFT")
            ->join("school e", "d.school_id", "=", "e.id","LEFT")
            ->join("cities f", "d.cities_id", "=", "f.id","LEFT");



        $head = $this->seo->render(
            CONF_SITE_NAME . " | Oportunidades",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/opportunities/home", [
            "app" => "opportunities/home",
            "head" => $head,
            "opportunities" => $opportunities->fetch(true),
        ]);
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function opportunity(?array $data): void
    {
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $opportunityCreate = new Opportunity();
            $opportunityCreate->name = $data["name"];
            $opportunityCreate->committee_id = $data["committee_id"];
            $opportunityCreate->consult_users_id = $data["consult_users_id"];
            $opportunityCreate->supervisor_users_id = $data["supervisor_users_id"];
            $opportunityCreate->date = $data["date"];
            $opportunityCreate->status = $data["status"];

            if (!$opportunityCreate->save()) {
                $json["message"] = $opportunityCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Oportunidade cadastrada com sucesso...")->flash();
            $json["redirect"] = url("/admin/opportunities/opportuninty/{$opportunityCreate->id}");

            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $opportunityUpdate = (new Opportunity())->findById($data["opportunity_id"]);

            if (!$opportunityUpdate) {
                $this->message->error("Você tentou editar uma oportunidade que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/opportunities/home")]);
                return;
            }

            $opportunityUpdate->name = (!empty($data["name"]) ? $data["name"] : $opportunityUpdate->name);
            $opportunityUpdate->committee_id = (!empty($data["committee_id"]) ? $data["committee_id"] : $opportunityUpdate->committee_id);
            $opportunityUpdate->version = (!empty($data["version"]) ? $data["version"] : $opportunityUpdate->version);
            $opportunityUpdate->date = (!empty($data["date"]) ? $data["date"] : $opportunityUpdate->date);
            $opportunityUpdate->consult_users_id = (!empty($data["consult_users_id"]) ? $data["consult_users_id"] : $opportunityUpdate->consult_users_id);
            $opportunityUpdate->supervisor_users_id = (!empty($data["supervisor_users_id"]) ? $data["supervisor_users_id"] : $opportunityUpdate->supervisor_users_id);
            $opportunityUpdate->status = (!empty($data["status"]) ? $data["status"] : $opportunityUpdate->status);


            if (!$opportunityUpdate->save()) {
                $json["message"] = $opportunityUpdate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Oportunidade atualizada com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $opportunityDelete = (new Opportunity())->findById($data["opportunity_id"]);

            if (!$opportunityDelete) {
                $this->message->error("Você tentou deletar uma oportunidade que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/opportunities/home")]);
                return;
            }

            $opportunityDelete->destroy();

            $this->message->success("A oportunidade foi excluída com sucesso...")->flash();
            echo json_encode(["redirect" => url("/admin/opportunities/home")]);

            return;
        }

        $opportunityEdit = null;
        if (!empty($data["opportunity_id"])) {
            $$opportunityId = filter_var($data["opportunity_id"], FILTER_VALIDATE_INT);
            $opportunityEdit = (new Opportunity())->findById($opportunityId);
        }

    }

}