<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SociometryResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'positive_score',
        'negative_score',
        'neutral_score',
        'total_score',
        'choices_received',
        'choices_given'
    ];

    protected $casts = [
        'choices_received' => 'array',
        'choices_given' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
