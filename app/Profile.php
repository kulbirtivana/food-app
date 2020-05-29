<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //

    public $timestamps = false;

    public function user(){
    	return $this->belongsTo('App\User');
    }

    protected $fillable = [
    	'username', 'phone', 'address', 'city', 'province', 'zip', 'picture', 'bio', 'user_id'];
}
