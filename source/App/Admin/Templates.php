<?php

namespace Source\App\Admin;

class Templates extends Admin
{

    public function __construct()
    {
        parent::__construct();
    }
    public function home(?array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " | Templates",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/templates/home", [
            "app" => "templates/home",
            "head" => $head
        ]);
    }
}