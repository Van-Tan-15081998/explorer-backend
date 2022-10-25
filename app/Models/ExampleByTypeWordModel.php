<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExampleByTypeWordModel extends Model
{
    use HasFactory;

    protected $table = 'example_by_type_words';
    protected $softDelete = true;
    protected $fillable = [
        'example',
        'word_id',
        'type_word_id',
        'word_mean_id',
        'is_vie_mean'
    ];
}
