<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Validator;

class Notes extends Model
{
    //
    protected $table = 'notes';
    protected $fillable = ['content', 'users_id', 'created_at', 'updated_at'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public static function rules($data)
    {
        $validation = Validator::make($data, [
            'content' => 'required|string|min:30',
        ]);
        return $validation->fails() ? $validation->errors() : false;
    }
}
