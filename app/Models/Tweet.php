<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Comment;

class Tweet extends Model
{
    use HasFactory;

    protected $fillable = [
        'tweet',
        'photo',
        'like',
        'reply',
        'retweet',
        'share',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id');
    }
}
