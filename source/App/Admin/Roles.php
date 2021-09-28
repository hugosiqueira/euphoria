<?php

namespace Source\App\Admin;
use Source\Models\Role;
use Source\Models\RolePermission;

class Roles extends Admin
{
    /**
     * Roles constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function role(?array $data): void
    {
        //update permissions
        if((!empty($data["action"]) && $data["action"] == "role_permission")){
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            //Deletando permissoes antigas
            $rolePermissionDelete = (new RolePermission())->findByRole($data["roles_id"]);
            foreach ($rolePermissionDelete as $item) {
                $permissionDelete = (new RolePermission())->findById($item->id);
                $permissionDelete->destroy();
            }

            //Criando novas permissões
            $rolePermissionNew = (new RolePermission());

            foreach($data as $param_key => $value) {
                $rolePermissionNew->roles_id = $data["roles_id"];
                if(substr($param_key, 0, strlen("permission")) == "permission") {
                    $widget_part = explode("-", $param_key);
                    $widget_id = (int)$widget_part[1];
                    $rolePermissionNew->widgets_id = $widget_id;
                    foreach ($data["permission-" . $widget_id] as $item) {
                        if ($item == "can_view")
                            $rolePermissionNew->can_view = 1;
                        if ($item == "can_add")
                            $rolePermissionNew->can_add = 1;
                        if ($item == "can_edit")
                            $rolePermissionNew->can_edit = 1;
                        if ($item == "can_delete")
                            $rolePermissionNew->can_delete = 1;
                    }
                    $rolePermissionNew->save();
                }
            }
            $this->message->success("Permissões atualizadas com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $roleCreate = new Role();
            $roleCreate->name = $data["name"];
            $roleCreate->created_at = date('Y-m-d H:i:s');

            if (!$roleCreate->save()) {
                $json["message"] = $roleCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Curso cadastrado com sucesso...")->flash();
            $json["redirect"] = url("/admin/config/role/{$roleCreate->id}");
            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $roleUpdate = (new Role())->findById($data["role_id"]);

            if (!$roleUpdate) {
                $this->message->error("Você tentou editar um curso que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/roles")]);
                return;
            }

            $roleUpdate->name = (!empty($data["name"]) ? $data["name"] : $roleUpdate->name);

            if (!$roleUpdate->save()) {
                $json["message"] = $roleUpdate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Curso atualizado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $roleDelete = (new Role())->findById($data["role_id"]);

            if (!$roleDelete) {
                $this->message->error("Você tentou deletar um curso que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/roles")]);
                return;
            }

            $roleDelete->destroy();

            $this->message->success("O curso foi excluído com sucesso...")->flash();
            echo json_encode(["redirect" => url("/admin/config/roles")]);
            return;
        }

        $roleEdit = null;
        if (!empty($data["role_id"])) {
            $roleId = filter_var($data["role_id"], FILTER_VALIDATE_INT);
            $roleEdit = (new Role())->findById($roleId);
        }

        if(isset($roleId)&&!empty($roleId)):
            $rolePermission = (new RolePermission())->findByRole($roleId);
        else:
            $rolePermission = "";
        endif;

        $head = $this->seo->render(
            CONF_SITE_NAME . " | " . ($roleEdit ? "Perfil de {$roleEdit->name}" : "Novo Curso"),
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/config/role", [
            "app" => "config/role",
            "head" => $head,
            "role" => $roleEdit,
            "rolePermission" => $rolePermission
        ]);
    }
}