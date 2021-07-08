<?php

use webdreamfeladat\App\Person;
use webdreamfeladat\App\Student;
use webdreamfeladat\App\Teacher;
use webdreamfeladat\App\SchoolClass;

require dirname(__DIR__)."/vendor/autoload.php";

/** @var students Student[] */
$students = [];

/** @var teachers Teacher[] */
$teachers = [];

/** @var schoolClasses SchoolClass[] */
$schoolClasses = [];

$data = json_decode(file_get_contents(__DIR__."/data.json"), true);

// creating students
foreach ($data["students"] as $student) {
    $students[] = new Student([
        "name" => $student["name"],
        "gender" => $student["gender"],
        "birthYear" => $student["birthYear"],
        "grades" => $student["grades"],
    ]);
}

// creating teachers
foreach ($data["teachers"] as $teacher) {
    $teachers[] = new Teacher([
        "name" => $teacher["name"],
        "gender" => $teacher["gender"],
        "birthYear" => $teacher["birthYear"],
        "status" => $teacher["status"],
    ]);
}

// create random school classes
for ($i = 0; $i < 3; $i++) {
    shuffle($teachers);
    shuffle($students);

    $schoolClasses[] = new SchoolClass([
        "teacher" => array_pop($teachers),
        "students" => array_splice($students, 0, 2),
    ]);
}

// showing details about classes
echo PHP_EOL;

for ($i = 0; $i < count($schoolClasses); $i++) {
    echo "School class " . ($i+1)                           . PHP_EOL;
    echo "-----------------------";
    echo PHP_EOL;
    echo "Teacher: " . $schoolClasses[$i]->getTeacherName();
    echo PHP_EOL;
    echo "Students: " . $schoolClasses[$i]->getNames()      . PHP_EOL;
    echo "class GPA: " . $schoolClasses[$i]->getclassGpa();

    echo PHP_EOL;
    echo PHP_EOL;

    // show a random student's details
    $student = $schoolClasses[$i]->getRandomStudent();
    echo "Details of " . $student->getName() . ":"          . PHP_EOL;
    echo "Name: " . $student->getName()                     . PHP_EOL;
    echo "Birthyear: " . $student->getBirthyear()           . PHP_EOL;
    echo "Gender: " . $student->getGender()                 . PHP_EOL;
    echo "Grades: " . implode(", ", $student->getGrades())  . PHP_EOL;
    echo "GPA: " . $student->getGpa()                       . PHP_EOL;

    echo PHP_EOL;
    echo PHP_EOL;
}