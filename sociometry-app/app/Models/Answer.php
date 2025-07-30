<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'user_id'];

public function user()
{
    return $this->belongsTo(\App\Models\User::class, 'user_id');
}

public function question()
{
    return $this->belongsTo(\App\Models\Question::class, 'question_id');
}

    public function selectedFriends()
    {
        return $this->belongsToMany(User::class, 'answer_user', 'answer_id', 'friend_id');
    }
}
