<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Flashmsg extends Model
{
    protected $table = 'flashmsgs';

    protected $fillable = [
        'title', 'description', 'file', 'active', 'start_date', 'end_date' 
    ];
}
