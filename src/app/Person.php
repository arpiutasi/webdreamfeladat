<?php

namespace webdreamfeladat\App;

use webdreamfeladat\App\BaseObj;

class Person extends BaseObj
{
    /**
     * @var string Name of the person.
     */
    protected string $name;

    /**
     * @var string Gender of the person
     */
    protected string $gender;

    /**
     * @var string Birthyear of the person
     */
    protected int $birthYear;

    public function getName() :string
    {
        return $this->name;
    }

    public function getGender() :string
    {
        return $this->gender;
    }

    public function getBirthYear() :int
    {
        return $this->birthYear;
    }
}