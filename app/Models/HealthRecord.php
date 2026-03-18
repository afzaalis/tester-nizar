<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    protected $fillable = ['patient_name', 'diagnosis', 'history'];

    protected function casts(): array
    {
        return [
            'diagnosis' => 'encrypted',
            'history' => 'encrypted',
        ];
    }
}
