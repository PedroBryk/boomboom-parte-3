<?php

namespace App\CQRS\Commands;

class DeleteTreinoCommand
{
    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }
}
