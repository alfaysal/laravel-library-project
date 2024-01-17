<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\DepartmentRepositoryInterface;
use App\Models\Department;
use Illuminate\Database\Eloquent\Model;

class DepartmentRepository extends BaseRepository implements DepartmentRepositoryInterface{

    public function __construct(Department $department)
    {
        parent::__construct($department);
    }

    public function findOrFail() : ?Model {
        return null;
    }
}