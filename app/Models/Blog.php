<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;

    public function label()
    {
        return $this->belongsToMany(Label::class,'blog_to_label');
    }

    public function itemize()
    {
        return $this->belongsTo(Itemize::class)->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
