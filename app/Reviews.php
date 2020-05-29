<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reviews extends Model
{
    //
      use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable =['profile_id', 'food_id', 'parent_id', 'content'];


	public function profiles()
    {
    	return $this->belongsTo('App\Profile');
    }

 	public function tweets()
    {
    	return $this->belongsTo('App\Food');
    }


    }
