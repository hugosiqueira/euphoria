<?php

namespace Source\App\Admin;

use Source\Models\Permissions\Permission;
use Source\Models\Permissions\UserPermission;
use Source\Models\Role;
use Source\Models\User;
use Source\Models\Widget;
use Source\Support\Pager;
use Source\Support\Thumb;
use Source\Support\Upload;

/**
 * Class Users
 * @package Source\App\Admin
 */
class Users extends Admin
{
    /**
     * Users constructor.
     */
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
        if (!empty($data["s"])) {
            $s = str_search($data["s"]);
            echo json_encode(["redirect" => url("/admin/users/home/{$s}/1")]);
            return;
        }

        $search = null;
        $users = (new User())->find();

        if (!empty($data["search"]) && str_search($data["search"]) != "all") {
            $search = str_search($data["search"]);
            $users = (new User())->find("MATCH(first_name, last_name, email) AGAINST(:s)", "s={$search}");
            if (!$users->count()) {
                $this->message->info("Sua pesquisa não retornou resultados")->flash();
                redirect("/admin/users/home");
            }
        }

        $all = ($search ?? "all");
        $pager = new Pager(url("/admin/users/home/{$all}/"));
        $pager->pager($users->count(), 12, (!empty($data["page"]) ? $data["page"] : 1));

        $head = $this->seo->render(
            CONF_SITE_NAME . " | Usuários",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        $roles = (new Role())->find();


        echo $this->view->render("widgets/config/users", [
            "app" => "config/users",
            "head" => $head,
            "search" => $search,
            "users" => $users->order("first_name, last_name")->limit($pager->limit())->offset($pager->offset())->fetch(true),
            "paginator" => $pager->render(),
            "roles" =>$roles->order("name")->fetch(true)
        ]);
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function user(?array $data): void
    {
        //update permissions
        if((!empty($data["action"]) && $data["action"] == "user_permission")){
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            //Deletando permissoes antigas
            $userPermissionDelete = (new UserPermission())->findByUser($data["users_id"]);
            foreach ($userPermissionDelete as $item) {
                $permissionDelete = (new UserPermission())->findById($item->id);
                $permissionDelete->destroy();
            }

            //Criando novas permissões
            $userPermissionNew = (new UserPermission());

            foreach($data as $param_key => $value) {
                $userPermissionNew->users_id = $data["users_id"];
                if(substr($param_key, 0, strlen("permission")) == "permission") {
                    $widget_part = explode("-", $param_key);
                    $widget_id = (int)$widget_part[1];
                    $userPermissionNew->widgets_id = $widget_id;
                    foreach ($data["permission-" . $widget_id] as $item) {
                        if ($item == "can_view")
                            $userPermissionNew->can_view = 1;
                        if ($item == "can_add")
                            $userPermissionNew->can_add = 1;
                        if ($item == "can_edit")
                            $userPermissionNew->can_edit = 1;
                        if ($item == "can_delete")
                            $userPermissionNew->can_delete = 1;
                    }
                    $userPermissionNew->save();
                }
            }
            $this->message->success("Permissões atualizadas com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $userCreate = new User();
            $userCreate->first_name = $data["first_name"];
            $userCreate->last_name = $data["last_name"];
            $userCreate->email = $data["email"];
            $pass = generatePassword();
            $userCreate->password = (empty($data["password"]) ? $pass : $data["password"]);
            $userCreate->roles_id = $data["roles_id"];
            $userCreate->cellphone = $data["cellphone"];


            //upload photo
            if (!empty($_FILES["photo"])) {
                $files = $_FILES["photo"];
                $upload = new Upload();
                $image = $upload->image($files, $userCreate->fullName(), 600);

                if (!$image) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }

                $userCreate->photo = $image;
            }

            if (!$userCreate->save($pass)) {
                $json["message"] = $userCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $userPermission = new UserPermission();
            $rolesPermissions = (new Permission())->findByRoles($data["roles_id"]);
            foreach ($rolesPermissions as $p):
                $userPermission->users_id = $userCreate->id;
                $userPermission->widgets_id = $p->widgets_id;
                $userPermission->can_view = $p->can_view;
                $userPermission->can_add = $p->can_add;
                $userPermission->can_edit = $p->can_edit;
                $userPermission->can_delete = $p->can_delete;
                $userPermission->save();
            endforeach;



            $this->message->success("Usuário cadastrado com sucesso...")->flash();
            $json["redirect"] = url("/admin/config/user/{$userCreate->id}");

            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $userUpdate = (new User())->findById($data["user_id"]);

            if (!$userUpdate) {
                $this->message->error("Você tentou gerenciar um usuário que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/users/home")]);
                return;
            }
            $changePermission = ($userUpdate->roles_id != $data["roles_id"] ? "true" : "false" );

            $userUpdate->first_name = (!empty($data["first_name"]) ? $data["first_name"] : $userUpdate->first_name);
            $userUpdate->last_name = (!empty($data["last_name"]) ? $data["last_name"] : $userUpdate->last_name);
            $userUpdate->email = (!empty($data["email"]) ? $data["email"] : $userUpdate->email);
            $userUpdate->password = (!empty($data["password"]) ? $data["password"] : $userUpdate->password);
            $userUpdate->roles_id = (!empty($data["roles_id"]) ? $data["roles_id"] : $userUpdate->roles_id);

            //upload photo
            if (!empty($_FILES["photo"])) {
                if ($userUpdate->photo && file_exists(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$userUpdate->photo}")) {
                    unlink(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$userUpdate->photo}");
                    (new Thumb())->flush($userUpdate->photo);
                }

                $files = $_FILES["photo"];
                $upload = new Upload();
                $image = $upload->image($files, $userUpdate->fullName(), 600);

                if (!$image) {
                    $json["message"] = $upload->message()->render();
                    echo json_encode($json);
                    return;
                }

                $userUpdate->photo = $image;
            }

            if (!$userUpdate->save()) {
                $json["message"] = $userUpdate->message()->render();
                echo json_encode($json);
                return;
            }

            if ($changePermission=="true"){
                $userPermissionDelete = (new UserPermission())->findByUser($data["user_id"]);
                foreach ($userPermissionDelete as $item) {
                    $permissionDelete = (new UserPermission())->findById($item->id);
                    $permissionDelete->destroy();
                }


                $userPermission = new UserPermission();
                $rolesPermissions = (new Permission())->findByRoles($data["roles_id"]);
                foreach ($rolesPermissions as $p):
                    $userPermission->users_id = $data["user_id"];
                    $userPermission->widgets_id = $p->widgets_id;
                    $userPermission->can_view = $p->can_view;
                    $userPermission->can_add = $p->can_add;
                    $userPermission->can_edit = $p->can_edit;
                    $userPermission->can_delete = $p->can_delete;
                    $userPermission->save();
                endforeach;
            }

            $this->message->success("Usuário atualizado com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $userDelete = (new User())->findById($data["user_id"]);

            if (!$userDelete) {
                $this->message->error("Você tentou deletar um usuário que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/users/home")]);
                return;
            }

            if ($userDelete->photo && file_exists(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$userDelete->photo}")) {
                unlink(__DIR__ . "/../../../" . CONF_UPLOAD_DIR . "/{$userDelete->photo}");
                (new Thumb())->flush($userDelete->photo);
            }

            $userDelete->destroy();

            $this->message->success("O usuário foi excluído com sucesso...")->flash();
            echo json_encode(["redirect" => url("/admin/users/home")]);

            return;
        }

        $userEdit = null;
        if (!empty($data["user_id"])) {
            $userId = filter_var($data["user_id"], FILTER_VALIDATE_INT);
            $userEdit = (new User())->findById($userId);
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | " . ($userEdit ? "Perfil de {$userEdit->fullName()}" : "Novo Usuário"),
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );
        $roles = (new Role())->find();
        if(isset($userId)&&!empty($userId)):
            $userPermission = (new UserPermission())->findByUser($userId);
        else:
            $userPermission = "";
        endif;

        echo $this->view->render("widgets/config/user", [
            "app" => "config/users/user",
            "head" => $head,
            "user" => $userEdit,
            "roles" =>$roles->order("name")->fetch(true),
            "userPermission" =>$userPermission

        ]);
    }
}