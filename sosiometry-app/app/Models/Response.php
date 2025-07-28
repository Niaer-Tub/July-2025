<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['question_id', 'responder_id', 'subject_id', 'score'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function responder()
    {
        return $this->belongsTo(User::class, 'responder_id');
    }

    public function subject()
    {
        return $this->belongsTo(User::class, 'subject_id');
    }
}
