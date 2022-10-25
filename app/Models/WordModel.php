<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WordModel extends Model
{
    use HasFactory;
    protected $table = 'words';
    protected $softDelete = true;
    protected $fillable = [
        'word',
        'popularity'
    ];

    public function pronounce()
    {
        return $this->hasOne(PronounceModel::class, 'word_id');
    }

    public function mean()
    {
        return $this->hasOne(WordMeanModel::class, 'word_id');
    }
}
