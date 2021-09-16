<?php

namespace Source\App\Admin;

/**
 * Classe Price
 */
class Price extends Admin
{
    /**
     * Construtor
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
        $head = $this->seo->render(
            CONF_SITE_NAME . " | Price List",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/price/home", [
            "app" => "price/home",
            "head" => $head
        ]);
    }
}