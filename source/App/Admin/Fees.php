<?php

namespace Source\App\Admin;
use Source\Models\Fee;

class Fees extends Admin
{
    /**
     * Fees constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function fee(?array $data): void
    {

        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $feeCreate = new Fee();
            $feeCreate->name = $data["name"];
            $feeCreate->created_at = date('Y-m-d H:i:s');

            if (!$feeCreate->save()) {
                $json["message"] = $feeCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Taxa cadastrado com sucesso...")->flash();
            $json["redirect"] = url("/admin/config/fee/{$feeCreate->id}");
            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $feeUpdate = (new Fee())->findById($data["fee_id"]);

            if (!$feeUpdate) {
                $this->message->error("Você tentou editar um taxa que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/fees")]);
                return;
            }

            $feeUpdate->name = (!empty($data["name"]) ? $data["name"] : $feeUpdate->name);

            if (!$feeUpdate->save()) {
                $json["message"] = $feeUpdate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Taxa atualizado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $feeDelete = (new Fee())->findById($data["fee_id"]);

            if (!$feeDelete) {
                $this->message->error("Você tentou deletar um taxa que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/fees")]);
                return;
            }

            $feeDelete->destroy();

            $this->message->success("O taxa foi excluído com sucesso...")->flash();
            echo json_encode(["redirect" => url("/admin/config/fees")]);
            return;
        }

        $feeEdit = null;
        if (!empty($data["fee_id"])) {
            $feeId = filter_var($data["fee_id"], FILTER_VALIDATE_INT);
            $feeEdit = (new Fee())->findById($feeId);
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | " . ($feeEdit ? "Perfil de {$feeEdit->name}" : "Novo Taxa"),
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/config/fee", [
            "app" => "config/fee",
            "head" => $head,
            "fee" => $feeEdit
        ]);
    }
}