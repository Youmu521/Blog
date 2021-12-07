<?php

namespace App\Admin\Repositories;

use App\Models\Web as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Web extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
