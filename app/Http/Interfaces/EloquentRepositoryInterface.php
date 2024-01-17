<?php

namespace App\Http\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface {
    
    public function create(array $attributes) : Model;

    public function find(int $id) : ?Model;
}