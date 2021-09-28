<?php

namespace Source\App\Admin;
use Source\Models\Course;

class Courses extends Admin
{
    /**
     * Courses constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function course(?array $data): void
    {

        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $courseCreate = new Course();
            $courseCreate->name = $data["name"];
            $courseCreate->created_at = date('Y-m-d H:i:s');

            if (!$courseCreate->save()) {
                $json["message"] = $courseCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Curso cadastrado com sucesso...")->flash();
            $json["redirect"] = url("/admin/config/course/{$courseCreate->id}");
            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $courseUpdate = (new Course())->findById($data["course_id"]);

            if (!$courseUpdate) {
                $this->message->error("Você tentou editar um curso que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/courses")]);
                return;
            }

            $courseUpdate->name = (!empty($data["name"]) ? $data["name"] : $courseUpdate->name);

            if (!$courseUpdate->save()) {
                $json["message"] = $courseUpdate->message()->render();
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
            $courseDelete = (new Course())->findById($data["course_id"]);

            if (!$courseDelete) {
                $this->message->error("Você tentou deletar um curso que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/config/courses")]);
                return;
            }

            $courseDelete->destroy();

            $this->message->success("O curso foi excluído com sucesso...")->flash();
            echo json_encode(["redirect" => url("/admin/config/courses")]);
            return;
        }

        $courseEdit = null;
        if (!empty($data["course_id"])) {
            $courseId = filter_var($data["course_id"], FILTER_VALIDATE_INT);
            $courseEdit = (new Course())->findById($courseId);
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | " . ($courseEdit ? "Perfil de {$courseEdit->name}" : "Novo Curso"),
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/config/course", [
            "app" => "config/course",
            "head" => $head,
            "course" => $courseEdit
        ]);
    }
}