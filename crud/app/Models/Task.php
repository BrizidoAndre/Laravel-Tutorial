<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

class Task extends Model
{
    protected $hidden = [
        'id'
    ];

    protected $fillable = [
        'name',
        'status'
    ];

    public static function rules(array $data): bool|MessageBag
    {
        $validation = Validator::make(
            $data,
            [
                'name' => 'string|min:4|required',
            ],
            [
                'required' => 'O campo :attribute é obrigatorio',
                'min' => 'O campo :attribute deve conter no minimo :min caracteres',
                'string' => 'O campo :attribute deve ser um texto válido',
            ]
        );

        return $validation->fails() ? $validation->errors() : false;
    }
}
