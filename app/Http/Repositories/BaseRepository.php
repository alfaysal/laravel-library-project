<?php

namespace App\Http\Repositories;

use App\Http\Interfaces\EloquentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements EloquentRepositoryInterface {

    protected Model $model;

    public function __construct(Model $model) {
       $this->model = $model;
    }

    public function create(array $attributes) : Model {
        // dd($attributes);
        return $this->model->create([
            'name' => 'hello'
        ]);
    }

    public function find(int $id) : ?Model {
        return null;
    }
}