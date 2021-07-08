<?php

namespace webdreamfeladat\App;

use webdreamfeladat\App\Gpa;

class SchoolClass extends BaseObj
{
    protected Teacher $teacher;

    /**
     * Array of webdreamfeladat\App\Student objects.
     * 
     * @var students Student[]
     */
    protected array $students;

    /**
     * Return comma-separated list of the names of studends in the class.
     * 
     * @return string The comma-separated list.
     */
    public function getNames() :string
    {
        $list = "";

        foreach ($this->students as $student) {
            /** @var student Student */
            $list .= $student->getName() . ", ";
        }

        return substr($list, 0, -2);
    }

    /**
     * Return the school class teacher's name.
     * 
     * @return string Teacher's name.
     */
    public function getTeacherName() :string
    {
        return $this->teacher->getName();
    }

    /**
     * Return with a randomly selected student from the class.
     * 
     * @return Student
     */
    public function getRandomStudent() :Student
    {
        return $this->students[rand(0, count($this->students) - 1)];
    }

    public function getClassGpa() :string
    {
        $gpa = new Gpa($this->getStudentGrades());
        return $gpa->getClassGpa();
    }

    private function getStudentGrades() :array
    {
        $grades = [];

        foreach ($this->students as $student) {
            /** @var student Student */
            $grades[] = $student->getGrades();
        }

        return $grades;
    }
}