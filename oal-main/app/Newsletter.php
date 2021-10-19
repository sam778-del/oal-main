<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Newsletter extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'title', 'detail', 'thumbnail', 'image', 'user_id', 'thumbnail', 'user_id', 'view_count', 'active'
    ];

    public function author(){
        return $this->belongsTo('App\User', 'user_id');
    }
}