<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'question_id', 'selected_names'];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function friend()
    {
        return $this->belongsTo(User::class, 'friend_id');
    }
    public function selectedFriends()
{
    // selected_names is stored as an array of names, so we map them to User objects
    return $this->belongsToMany(User::class, 'users', 'id', 'id')
        ->whereIn('name', json_decode($this->selected_names, true) ?? []);
}


    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
