<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Message;

class Thread extends Model
{
    use HasFactory;

    protected $fillable = [
        'threadTitle'
    ];

    public function message()
    {
        return $this->hasMany(Message::class);
    }
}
