<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ProfessorServiceInterface
{
    public function create(Request $request);
    public function findById(int $id);
    public function update(Request $request, int $id);
    public function delete(int $id);
}
