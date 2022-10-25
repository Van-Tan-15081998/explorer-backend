<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeWordModel extends Model
{
    use HasFactory;

    protected $table = 'type_words';
    protected $softDelete = true;
    protected $fillable = [
        'acronym',
        'eng_description',
        'vie_description',
        'background_color',
        'text_color'
    ];
}
