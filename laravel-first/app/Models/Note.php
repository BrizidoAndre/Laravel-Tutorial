<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $table = 'notes';
    use HasFactory;

    protected $fillable = ['note', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
