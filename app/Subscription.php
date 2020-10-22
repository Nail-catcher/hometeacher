<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
	//git you dolbayob?
    protected $table = 'subscription';
    protected $fillable = ['end_date', 'id', 'status','OrderId'];
}
