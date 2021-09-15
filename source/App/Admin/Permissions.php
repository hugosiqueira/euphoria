<?php

namespace Source\App\Admin;
use Source\Models\Permissions\Permission;
use Source\Models\Role;

class Permissions extends Admin
{
    function __construct()
    {
        parent::__construct();
    }

    public function home(?array $data): void
    {
        $permissions = (new Permission())
            ->find("", "", "*, a.name as role, b.name as widget")
            ->join("roles a", "roles_permissions.roles_id", "=", "a.id", "LEFT")
            ->join("widgets b", "roles_permissions.widgets_id", "=", "b.id", "LEFT")
            ->group("widgets_id");

        $roles = (new Role())->find();



        $head = $this->seo->render(
            CONF_SITE_NAME . " | Permissões dos Cargos",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );


        echo $this->view->render("widgets/config/permissions", [
            "app" => "config/permissions",
            "head" => $head,
            "permissions" => $permissions->fetch(true),
            "roles" => $roles->fetch(true),
            "permissionsConsultor"=>(new Permission())->findByWidget("1"),
            "permissionsProdutor"=>(new Permission())->findByWidget("2"),
            "permissionsSupervisor"=>(new Permission())->findByWidget("3"),
            "permissionsRC"=>(new Permission())->findByWidget("4"),
            "permissionsDiretor"=>(new Permission())->findByWidget("5"),
            "permissionsAdministrador"=>(new Permission())->findByWidget("6")
        ]);
    }
}