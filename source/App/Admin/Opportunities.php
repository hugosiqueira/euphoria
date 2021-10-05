<?php

namespace Source\App\Admin;
use Source\Models\City;
use Source\Models\Event;
use Source\Models\Opportunities\Opportunity;
use Source\Models\Course;
use Source\Models\Projects\Project;
use Source\Models\Projects\ProjectEvents;
use Source\Models\School;
use Source\Models\StudentsClass\StudentsClass;
use Source\Models\User;

/**
 *
 */
class Opportunities extends Admin
{
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

        $opportunities = (new Opportunity())
            ->find("", "","opportunities.id, CONCAT(a.first_name, ' ', a.last_name) as consult, CONCAT(b.first_name, ' ', b.last_name) as supervisor, opportunities.created_at, opportunities.update_at, f.name as city, opportunities.name, opportunities.status, opportunities.supervisor_users_id, opportunities.consult_users_id" )
            ->join("users a", "opportunities.consult_users_id", "=", "a.id", "LEFT")
            ->join("users b", "opportunities.supervisor_users_id", "=", "b.id", "LEFT")
            ->join("class d", "opportunities.class_id", "=", "d.id","LEFT")
            ->join("school e", "d.school_id", "=", "e.id","LEFT")
            ->join("cities f", "d.cities_id", "=", "f.id","LEFT");


        $head = $this->seo->render(
            CONF_SITE_NAME . " | Oportunidades",
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/opportunities/home", [
            "app" => "opportunities/home",
            "head" => $head,
            "opportunities" => $opportunities->fetch(true)
        ]);
    }

    /**
     * @param array|null $data
     * @throws \Exception
     */
    public function opportunity(?array $data): void
    {
        //create
        if (!empty($data["action"]) && $data["action"] == "create") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);

            $classCreate = new StudentsClass();
            $classCreate->president_name = $data["president_name"];
            $classCreate->president_email = $data["president_email"];
            $classCreate->president_cellphone = $data["president_cellphone"];
            $classCreate->course_id = $data["course_id"];
            $classCreate->school_id = $data["school_id"];
            $classCreate->cities_id = $data["cities_id"];
            $classCreate->number_students = $data["number_students"];
            $classCreate->number_graduates = $data["number_graduates"];
            $classCreate->conclusion_year = $data["conclusion_year"];
            $classCreate->conclusion_semester = $data["conclusion_semester"];
            $classCreate->party_preview = $data["party_preview"];
            $classCreate->package = $data["package"];
            $classCreate->created_at = date("Y-m-d H:i:s");

            if (!$classCreate->save()) {
                $json["message"] = $classCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $opportunityCreate = new Opportunity();

            $opportunityCreate->name = $data["opportunity_name"];
            $opportunityCreate->class_id = $classCreate->id;
            $opportunityCreate->consult_users_id = $data["consult_users_id"];
            $opportunityCreate->supervisor_users_id = $data["supervisor_users_id"];
            $opportunityCreate->status = $data["status"];
            $opportunityCreate->obs = $data["obs"];
            $opportunityCreate->created_at = date("Y-m-d H:i:s");

            if (!$opportunityCreate->save()) {
                $json["message"] = $opportunityCreate->message()->render();
                echo json_encode($json);
                return;
            }

            $projectCreate = new Project();
            $projectCreate->name = $data["opportunity_name"];
            $projectCreate->opportunities_id = $opportunityCreate->id;
            $projectCreate->version = '1.0';
            $projectCreate->status = 0;
            $projectCreate->created_at = date('Y-m-d H:i:s');

            if (!$projectCreate->save()) {
                $json["message"] = $projectCreate->message()->render();
                echo json_encode($json);
                return;
            }


            if(!empty($_POST['events'])){

                foreach($_POST['events'] as $checked){
                    $projectEventsCreate = new ProjectEvents();
                    $projectEventsCreate->project_id =  $projectCreate->id;
                    $projectEventsCreate->event_id =  $checked;
                    $projectEventsCreate->created_at = date('Y-m-d H:i:s');
                    $projectEventsCreate->save();
                }
            }


            $this->message->success("Oportunidade cadastrada com sucesso...")->flash();
            $json["redirect"] = url("/admin/opportunities/opportunity/{$opportunityCreate->id}");

            echo json_encode($json);
            return;
        }

        //update
        if (!empty($data["action"]) && $data["action"] == "update") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $opportunityUpdate = (new Opportunity())->findById($data["opportunity_id"]);

            if (!$opportunityUpdate) {
                $this->message->error("Você tentou editar uma oportunidade que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/opportunities")]);
                return;
            }

            $opportunityUpdate->name = (!empty($data["name"]) ? $data["name"] : $opportunityUpdate->name);
            $opportunityUpdate->consult_users_id = (!empty($data["consult_users_id"]) ? $data["consult_users_id"] : $opportunityUpdate->consult_users_id);
            $opportunityUpdate->supervisor_users_id = (!empty($data["supervisor_users_id"]) ? $data["supervisor_users_id"] : $opportunityUpdate->supervisor_users_id);
            $opportunityUpdate->obs = (!empty($data["obs"]) ? $data["obs"] : $opportunityUpdate->obs);
            $opportunityUpdate->status = (!empty($data["status"]) ? $data["status"] : $opportunityUpdate->status);

            if (!$opportunityUpdate->save()) {
                $json["message"] = $opportunityUpdate->message()->render();
                echo json_encode($json);
                return;
            }

            $classUpdate = (new StudentsClass())->findById($data["class_id"]);

            if(!$classUpdate){
                $this->message->error("Você tentou editar uma turma que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/opportunities")]);
                return;
            }

            $classUpdate->name = (!empty($data["president_name"]) ? $data["president_name"] : $classUpdate->president_name);
            $classUpdate->president_email = (!empty($data["president_email"]) ? $data["president_email"] : $classUpdate->president_email);
            $classUpdate->president_cellphone = (!empty($data["president_cellphone"]) ? $data["president_cellphone"] : $classUpdate->president_cellphone);
            $classUpdate->school_id = (!empty($data["school_id"]) ? $data["school_id"] : $classUpdate->school_id);
            $classUpdate->cities_id = (!empty($data["cities_id"]) ? $data["cities_id"] : $classUpdate->cities_id);
            $classUpdate->course_id = (!empty($data["course_id"]) ? $data["course_id"] : $classUpdate->course_id);
            $classUpdate->number_students = (!empty($data["number_students"]) ? $data["number_students"] : $classUpdate->number_students);
            $classUpdate->number_graduates = (!empty($data["number_graduates"]) ? $data["number_graduates"] : $classUpdate->number_graduates);
            $classUpdate->conclusion_year = (!empty($data["conclusion_year"]) ? $data["conclusion_year"] : $classUpdate->conclusion_year);
            $classUpdate->conclusion_semester = (!empty($data["conclusion_semester"]) ? $data["conclusion_semester"] : $classUpdate->conclusion_semester);
            $classUpdate->party_preview = (!empty($data["party_preview"]) ? $data["party_preview"] : $classUpdate->party_preview);
            $classUpdate->package = (!empty($data["package"]) ? $data["package"] : $classUpdate->package);
            $classUpdate->status = (!empty($data["status"]) ? $data["status"] : $classUpdate->status);



            if (!$classUpdate->save()) {
                $json["message"] = $classUpdate->message()->render();
                echo json_encode($json);
                return;
            }

            $this->message->success("Oportunidade atualizada com sucesso...")->flash();
            echo json_encode(["reload" => true]);
            return;
        }

        //delete
        if (!empty($data["action"]) && $data["action"] == "delete") {
            $data = filter_var_array($data, FILTER_SANITIZE_STRIPPED);
            $opportunityDelete = (new Opportunity())->findById($data["opportunity_id"]);

            if (!$opportunityDelete) {
                $this->message->error("Você tentou deletar uma oportunidade que não existe")->flash();
                echo json_encode(["redirect" => url("/admin/opportunities/home")]);
                return;
            }

            $opportunityDelete->destroy();

            $this->message->success("A oportunidade foi excluída com sucesso...")->flash();
            echo json_encode(["redirect" => url("/admin/opportunities/home")]);

            return;
        }

        $opportunityEdit = null;
        $classEdit = null;
        $projectsEdit = null;
        if (!empty($data["opportunity_id"])) {
            $opportunityId = filter_var($data["opportunity_id"], FILTER_VALIDATE_INT);
            $projectsEdit = (new Project())->find('opportunities_id=:o', "o={$opportunityId}" )->fetch(true);
           /* $opportunityEdit = (new Opportunity())->find("id=:id", "id=".$opportunityId,"opportunities.id,opportunities.class_id, CONCAT(a.first_name, ' ', a.last_name) as consult, CONCAT(b.first_name, ' ', b.last_name) as supervisor, opportunities.created_at, opportunities.update_at, f.name as city, opportunities.name, opportunities.status, opportunities.supervisor_users_id, opportunities.consult_users_id" )
                ->join("users a", "opportunities.consult_users_id", "=", "a.id", "LEFT")
                ->join("users b", "opportunities.supervisor_users_id", "=", "b.id", "LEFT")
                ->join("class d", "opportunities.class_id", "=", "d.id","LEFT")
                ->join("school e", "d.school_id", "=", "e.id","LEFT")
                ->join("cities f", "d.cities_id", "=", "f.id","LEFT")->fetch(true);*/
            $opportunityEdit = (new Opportunity())->findById($opportunityId);
            $opportunityClass = $opportunityEdit->class_id;
            $classEdit = (new StudentsClass())->findById($opportunityClass);
        }

        $head = $this->seo->render(
            CONF_SITE_NAME . " | " . ($opportunityEdit ? "Oportunidade da {$opportunityEdit->name}" : "Nova Oportunidade"),
            CONF_SITE_DESC,
            url("/admin"),
            url("/admin/assets/images/image.jpg"),
            false
        );

        echo $this->view->render("widgets/opportunities/opportunity", [
            "app" => "opportunity",
            "head" => $head,
            "opportunity" => $opportunityEdit,
            "courses" => (new Course())->find()->fetch(true),
            "schools" => (new School())->find()->fetch(true),
            "cities" => (new City())-> find('uf = :s', 's=11')->fetch(true),
            "events" => (new Event())->find()->fetch(true),
            "projects" => $projectsEdit,
            "supervisors" => (new User())->find('roles_id = :r','r=3')->fetch(true),
            "class" => $classEdit
        ]);

    }

}