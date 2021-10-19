<?php


namespace App;


use Illuminate\Database\Eloquent\Model;


class Price extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'latest_price', 'dealing_date', 'ytd_return', 'active'
    ];
}