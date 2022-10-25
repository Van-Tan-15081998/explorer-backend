<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PronounceModel extends Model
{
    use HasFactory;

    protected $table = 'pronounces';
    protected $softDelete = true;
    protected $fillable = [
        'us',
        'uk',
        'word_id',
    ];
}
