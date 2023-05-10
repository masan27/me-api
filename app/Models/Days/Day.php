<?php

namespace App\Models\Days;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $table = 'days';

    protected $fillable = [
        'name',
    ];
}
