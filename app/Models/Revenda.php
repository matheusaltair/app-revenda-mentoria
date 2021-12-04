<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revenda extends Model
{
    use HasFactory;

    protected $table = 'revenda';
    
    protected $fillable = [
        'marca', 'modelo', 'ano', 'valor'
    ];
}
