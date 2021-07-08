<?php

namespace webdreamfeladat\App;

class BaseObj
{
    public function __construct(array $properties = [])
    {
        foreach ($properties as $varName => $varValue) {
            $this->$varName = $varValue;
        }
    }
}