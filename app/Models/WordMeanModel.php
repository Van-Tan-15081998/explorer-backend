<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordMeanModel extends Model
{
    use HasFactory;

    protected $table = 'word_means';
    protected $softDelete = true;
    protected $fillable = [
        'mean',
        'word_id',
        'type_word_id',
        'is_popularity',
        'is_vie_mean'
    ];
}
