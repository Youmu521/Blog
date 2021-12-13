<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
	use HasDateTimeFormatter;

    public function blog()
    {
        return $this->belongsToMany(Blog::class,'blog_to_label');
    }

    protected $fillable = ['name'];
}
