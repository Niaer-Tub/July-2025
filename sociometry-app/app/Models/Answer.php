<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['question_id', 'user_id'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // the student who answered
    }

    public function selectedFriends()
    {
        return $this->belongsToMany(User::class, 'answer_user', 'answer_id', 'friend_id');
    }
}
