<?php

namespace App\Http\Controllers\TypeWord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TypeWordModel;

class TypeWordController extends Controller
{
    //
    public function getTypeWord()
    {
        $typeWord = TypeWordModel::select('*')->get()->toArray();
        return $typeWord;
    }
}
