<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'country';

    public $timestamps = false;


    public function states()
    {
        return $this->hasMany('App\State');
    }

    /*public function getPrefixAttribute(){
	    return '+'.$this->calling_code . '-' . $this->name;
	}*/
}
