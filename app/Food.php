<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class Food extends Model
{
    //
    use SoftDeletes;

    // use Sluggable;

    public $timestamps = false;

    protected $guarded = [];

    protected $dates = ['deleted_at'];

    protected $fillable = array(
    	'foodname',
    	'photo',
    	'ingredients',
        'price'
        
    );

    //  public function sluggable()
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }

    public function profiles()
    {
    	return $this->belongsTo( 'App\Profile');
    }

    public function user()
    {
        return $this->belongsTo( 'App\User');
    }

    public function reviews()

    {
    	return $this->hasMany(Reviews::class)->whereNull('parent_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'foodname'
            ]
        ];
    }


}
