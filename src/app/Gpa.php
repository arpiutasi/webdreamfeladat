<?php

namespace webdreamfeladat\App;

class Gpa
{
    /**
     * @var array Grades of a single student or multi-dimensional array of grades of one or more students.
     */
    private array $grades;

    /**
     * @var array Values of grades in incrementing order.
     */
    private array $gradeOrder = [
        "F", "D", "C", "B", "A"
    ];

    public function __construct(array $grades = [])
    {
        if (!count($grades)) {
            throw new Exception("Invalid grades");
        }

        $this->grades = $grades;
    }

    /**
     * Return the GPA of a student.
     * 
     * @return string GPA of a student.
     */
    public function getStudentGpa() :string
    {
        if (is_array($this->grades[0])) {
            throw new Exception("Invalid grades");
        }

        $gradeVals = [];
        $gpa = "";
        
        foreach ($this->grades as $grade) {
            $gradeVals[] = array_search($grade, $this->gradeOrder) + 1;
        }

        return $this->gradeOrder[round(array_sum($gradeVals) / count($gradeVals)) - 1];
    }

    /**
     * Return the GPA of a class.
     * 
     * @return string GPA of a class.
     */
    public function getClassGpa() :string
    {
        if (!is_array($this->grades[0])) {
            throw new Exception("Invalid grades");
        }

        $grades = [];
        $gradeVals = [];
        $gpa = "";

        foreach ($this->grades as $studentGrades) {
            $gpa = new Gpa($studentGrades);
            $grades[] = $gpa->getStudentGpa();
        }
        
        foreach ($grades as $grade) {
            $gradeVals[] = array_search($grade, $this->gradeOrder) + 1;
        }

        return $this->gradeOrder[round(array_sum($gradeVals) / count($gradeVals)) - 1];
    }
}