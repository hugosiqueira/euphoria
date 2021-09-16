<?php

namespace Source\Models\Permissions;
use Source\Core\Model;

/**
 *
 */
class Permission extends Model
{
    /**
     *
     */
    public function __construct()
    {
        parent::__construct("roles_permissions", ["id"], ["roles_id"], ["widget_id"]);
    }

    /**
     * @param int $id
     * @return mixed|Permission
     */
    public function findByWidget(int $id)
    {
        return parent::find("widgets_id=:id", "id={$id}", "*")->fetch("true");
    }

    /**
     * @param int $id
     * @return mixed|Permission
     */
    public function findByRoles(int $id)
    {
        return parent::find("roles_id=:id", "id={$id}", "*")->fetch("true");
    }


}