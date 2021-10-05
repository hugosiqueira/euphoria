<?php

namespace Source\Models\StudentsClass;

class StudentsClass extends \Source\Core\Model
{
    public function __construct()
    {
        parent::__construct("class", ["id"], ["president_name", "school_id", "cities_id", "course_id"]);
    }

    /**
     * @param string $president_name
     * @param string $president_email
     * @param string $president_cellphone
     * @param int $school_id
     * @param int $course_id
     * @param int $cities_id
     * @param int $number_students
     * @param int $number_graduates
     * @param int $conclusion_year
     * @param int $conclusion_semester
     * @param string $party_preview
     * @return StudentsClass
     */
    public function bootstrap(
        string $president_name,
        string $president_email,
        string $president_cellphone,
        int $school_id,
        int $course_id,
        int $cities_id,
        int $number_students,
        int $number_graduates,
        int $conclusion_year,
        int $conclusion_semester,
        string $party_preview
    ): StudentsClass {
        $this->president_name = $president_name;
        $this->president_email = $president_email;
        $this->president_cellphone = $president_cellphone;
        $this->school_id = $school_id;
        $this->course_id = $course_id;
        $this->cities_id = $cities_id;
        $this->number_students = $number_students;
        $this->number_graduates = $number_graduates;
        $this->conclusion_year = $conclusion_year;
        $this->conclusion_semester = $conclusion_semester;
        $this->party_preview = $party_preview;
        return $this;
    }

    /**
     * @return bool
     */
    public function save(): bool
    {
        if (!$this->required()) {
            $this->message->warning("Preencha todos campos obrigatório");
            return false;
        }

        /** StudentsClass Update */
        if (!empty($this->id)) {
            $classId = $this->id;

            $this->update($this->safe(), "id = :id", "id={$classId}");
            if ($this->fail()) {
                $this->message->error("Erro ao atualizar, verifique os dados");
                return false;
            }
        }

        /** StudentsClass Create */
        if (empty($this->id)) {
            if ($this->find("course_id = :c AND school_id = :s AND cities_id = :ct AND conclusion_year = :cy AND conclusion_semester = :cs", "c={$this->course_id}&s={$this->school_id}&ct={$this->cities_id}&cy={$this->conclusion_year}&cs={$this->conclusion_semester}", "id")->fetch()) {
                $this->message->warning("A turma para os dados informados já está cadastrada");
                return false;
            }

            $classId = $this->create($this->safe());
            if ($this->fail()) {
                $this->message->error("Erro ao cadastrar, verifique os dados");
                return false;
            }

        }
        $this->data = ($this->findById($classId))->data();

        return true;
    }
}