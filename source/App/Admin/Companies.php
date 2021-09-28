<?php

namespace Source\App\Admin;
use Source\Models\City;
use Source\Models\Company;
use Source\Models\State;

class Companies extends Admin
{
    /**
     * Companies constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function company(?array $data): void
    {

        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $companyCreate = new Company();
            $companyCreate->name = $data["name"];
            $companyCreate->email = $data["email"];
            $companyCreate->address = $data["address"];
            $companyCreate->celular = $data["celular"];
            $companyCreate->cities_id = $data["cities_id"];
            $companyCreate->created_at = date('Y-m-d H:i:s');

            if (!$companyCreate->save()) {
                $json["message"] = $companyCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Instituição cadastrada com sucesso...")->flash();
            $json["redirect"] = url("/admin/config/company/{$companyCreate->id}");
            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $companyUpdate = (new Company())->findById($data["company_id"]);

            if (!$companyUpdate) {
                $this->message->error("Você tentou editar uma instituição que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/companies")]);
                return;
            }

            $companyUpdate->name = (!empty($data["name"]) ? $data["name"] : $companyUpdate->name);
            $companyUpdate->email = (!empty($data["email"]) ? $data["email"] : $companyUpdate->email);
            $companyUpdate->address = (!empty($data["address"]) ? $data["address"] : $companyUpdate->address);
            $companyUpdate->celular = (!empty($data["celular"]) ? $data["celular"] : $companyUpdate->celular);
            $companyUpdate->cities_id = (!empty($data["cities_id"]) ? $data["cities_id"] : $companyUpdate->cities_id);

            if (!$companyUpdate->save()) {
                $json["message"] = $companyUpdate->message()->render();
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
            $companyDelete = (new Company())->findById($data["company_id"]);

            if (!$companyDelete) {
                $this->message->error("Você tentou deletar uma instituição que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/companies")]);
                return;
            }

            $companyDelete->destroy();

            $this->message->success("A instituição foi excluída com sucesso...")->flash();
            echo json_encode(["redirect" => url("/admin/config/companies")]);
            return;
        }

        $companyEdit = null;
        if (!empty($data["company_id"])) {
            $companyId = filter_var($data["company_id"], FILTER_VALIDATE_INT);
            $companyEdit = (new Company())->findById($companyId);
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | " . ($companyEdit ? "Perfil de {$companyEdit->name}" : "Novo Instituição"),
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/config/company", [
            "app" => "config/company",
            "head" => $head,
            "company" => $companyEdit,
            "states" => (new State())->find()->order('name')->fetch('all'),
            "cities" => (new City())->find()->order('name')->fetch('all')
        ]);
    }

}