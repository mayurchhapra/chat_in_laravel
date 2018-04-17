<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    public $table="chat";
    //
    protected $fillable = [
        'sender_id',
        'receiver_id',
        'content',
    ];

    public function sender_id(){
        return $this->belongsTo('App\Models\User');
    }
    public function receiver_id(){
        return $this->belongsTo('App\Models\User');
    }
}
