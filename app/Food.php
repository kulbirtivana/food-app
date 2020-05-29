<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Food extends Model
{
    //
    use SoftDeletes;

    public $timestamps = false;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    protected $fillable = array(
    	'photo',
    	'ingredients',
    	'profile_id'
    );

    public function profiles()
    {
    	return $this->belongsTo( 'App\Profile');
    }

    public function reviews()

    {
    	return $this->hasMany(Reviews::class)->whereNull('parent_id');
    }
}
