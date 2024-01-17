<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface DepartmentRepositoryInterface extends EloquentRepositoryInterface{

    public function findOrFail() : ?Model;
}