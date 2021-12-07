<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Dcat\Admin\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;

class Web extends Model implements Sortable
{
    use HasDateTimeFormatter,ModelTree;
    protected $table = 'web';

}
