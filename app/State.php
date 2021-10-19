<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'state';

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo('App\Country');
    }
}
