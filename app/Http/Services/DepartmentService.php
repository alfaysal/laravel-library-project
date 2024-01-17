<?php

namespace App\Http\Services;

use App\Http\Interfaces\DepartmentRepositoryInterface;

class DepartmentService {
    public DepartmentRepositoryInterface $departmentRepository;

    public function __construct(DepartmentRepositoryInterface $departmentRepository)
    {
        $this->departmentRepository = $departmentRepository;
    }

    public function saveDepartment(array $attributes) {
        $this->departmentRepository->create($attributes);
    }
}