<?php

namespace App\Services\Professor;

use App\Interfaces\ProfessorServiceInterface;

class ProfessorFactory
{
    public static function create(): ProfessorServiceInterface
    {
        $validator = new ProfessorValidator();
        return new ProfessorService($validator);
    }
}
