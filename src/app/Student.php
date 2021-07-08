<?php

namespace webdreamfeladat\App;

use webdreamfeladat\App\Gpa;

class Student extends Person
{
    /**
     * @var string The type of the class the student attends.
     */
    protected string $classType;

    /**
     * @var string Grades of the student.
     */
    protected array $grades;

    /**
     * Calculate the GPA of the student
     * 
     * @return string GPA of student
     */
    public function getGpa() :string
    {
        $gpa = new Gpa($this->grades);
        return $gpa->getStudentGpa();
    }

    /**
     * Return the grades of the student.
     * 
     * @return array
     */
    public function getGrades() :array
    {
        return $this->grades;
    }
}