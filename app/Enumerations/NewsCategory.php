<?php

namespace App\Enumerations;

enum NewsCategory: string
{
    case ALUMNI = "alumni";
    case EVENTS = "events";
    case SCHOOL = "school";
    case MEMBERS = "members";
    case STUDENTS = "students";

    public function name()
    {
        return ucfirst(strtolower($this->name));
    }
}
