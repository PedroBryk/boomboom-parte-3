<?php

namespace App\CQRS\Queries;

class GetTreinoByIdQuery
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}
