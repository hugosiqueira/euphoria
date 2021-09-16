<?php

namespace Source\App\Admin;

class Projects extends Admin
{
    public function __construct()
    {
        parent::__construct();
    }
    public function adjustment(?array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " | Readequação de Projetos",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/projects/adjustment", [
            "app" => "projects/adjustment",
            "head" => $head
        ]);
    }

    public function approved(?array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " | Aprovação de Projetos",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/projects/approved", [
            "app" => "projects/approved",
            "head" => $head
        ]);
    }
}