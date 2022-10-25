<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EngWordMeanModel extends Model
{
    use HasFactory;

    protected $table = 'eng_word_means';
    protected $softDelete = true;
    protected $fillable = [
        'mean',
        'example',
        'word_id',
        'type_word_id'
    ];
}
