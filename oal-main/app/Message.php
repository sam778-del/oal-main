<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'user_emails';

    protected $fillable = [
        'type', 'user_group_id', 'from_name', 'from_email', 'subject', 'message', 'attachment'
    ];
}
