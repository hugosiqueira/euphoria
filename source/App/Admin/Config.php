<?php

namespace Source\App\Admin;
use Source\Models\Company;
use Source\Models\Course;
use Source\Models\Event;
use Source\Models\Fee;
use Source\Models\Role;
use Source\Models\School;

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


    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function schools(?array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " | Empresas",
            CONF_SITE_DESC,
            url("/admin"),
            theme("/assets/images/image.jpg", CONF_VIEW_ADMIN),
            false
        );

        echo $this->view->render("widgets/config/schools", [
            "app" => "config/schools",
            "head" => $head,
            "schools" => (new School())->find()->order("name")->fetch(true)
        ]);
    }


    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function companies(?array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " | Fornecedores",
            CONF_SITE_DESC,
            url("/admin"),
            theme("/assets/images/image.jpg", CONF_VIEW_ADMIN),
            false
        );

        echo $this->view->render("widgets/config/companies", [
            "app" => "config/companies",
            "head" => $head,
            "companies" => (new Company())->find()->order("name")->fetch(true)
        ]);
    }


    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function roles(?array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " | Cargos",
            CONF_SITE_DESC,
            url("/admin"),
            theme("/assets/images/image.jpg", CONF_VIEW_ADMIN),
            false
        );

        echo $this->view->render("widgets/config/roles", [
            "app" => "config/roles",
            "head" => $head,
            "roles" => (new Role())->find()->order("name")->fetch(true)
        ]);
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function events(?array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " | Eventos",
            CONF_SITE_DESC,
            url("/admin"),
            theme("/assets/images/image.jpg", CONF_VIEW_ADMIN),
            false
        );

        echo $this->view->render("widgets/config/events", [
            "app" => "config/events",
            "head" => $head,
            "events" => (new Event())->find()->order("name")->fetch(true)

        ]);
    }


    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function courses(?array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " | Cursos",
            CONF_SITE_DESC,
            url("/admin"),
            theme("/assets/images/image.jpg", CONF_VIEW_ADMIN),
            false
        );

        echo $this->view->render("widgets/config/courses", [
            "app" => "config/courses",
            "head" => $head,
            "courses" => (new Course())->find()->order("name")->fetch(true)
        ]);
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function fees(?array $data): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " | Taxas",
            CONF_SITE_DESC,
            url("/admin"),
            theme("/assets/images/image.jpg", CONF_VIEW_ADMIN),
            false
        );

        echo $this->view->render("widgets/config/fees", [
            "app" => "config/fees",
            "head" => $head,
            "fees" => (new Fee())->find()->order("name")->fetch(true)
        ]);
    }

}