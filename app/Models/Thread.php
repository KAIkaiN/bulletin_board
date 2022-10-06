<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','threadTitle','latest_comment_time',
    ];

    //親テーブル紐付け
    public function user(){
        return $this->belongsTo(User::class);
    }

    //子テーブルを紐付け
    public function message()
    {
        return $this->hasMany(Message::class);
    }
}
