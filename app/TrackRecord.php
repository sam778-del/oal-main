<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class TrackRecord extends Model
{
	
	protected $table = 'trackrecords';

    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'period', 'returns'
    ];
}