<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_subscription extends Model
{
    protected $table = 'user_subscription';
    protected $fillable = ['id_user', 'id', 'id_sub'];
}
