<?php

namespace Source\App\Admin;

class Config extends Admin
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function home(?array $data): void
    {
       $head = $this->seo->render(
            CONF_SITE_NAME . " | Configurações",
            CONF_SITE_DESC,
            url("/admin"),
            theme("/assets/images/image.jpg", CONF_VIEW_ADMIN),
            false
        );

        echo $this->view->render("widgets/config/home", [
            "app" => "config/home",
            "head" => $head
        ]);
    }

}