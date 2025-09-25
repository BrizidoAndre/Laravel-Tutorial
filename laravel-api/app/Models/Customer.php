<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory;

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }

    protected $hidden = ['created_at', 'updated_at', 'id'];
}
