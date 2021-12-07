<?php

namespace App\Admin\Repositories;

use App\Models\Itemize as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Itemize extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
