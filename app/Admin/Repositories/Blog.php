<?php

namespace App\Admin\Repositories;

use App\Models\Blog as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Blog extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
