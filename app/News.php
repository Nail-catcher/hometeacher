<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['id',	'name',	'preview_text',	'detail_text',	'created_at',	'updated_at'];
}
