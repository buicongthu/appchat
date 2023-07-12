<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessGroup extends Model
{

    use HasFactory;
    protected $table = 'mess_groups';
    protected $guards = [];
    public function users()
    {
        return $this->belongsToMany(User::class,'user_group','conversation_id','user_id');
    }
}
