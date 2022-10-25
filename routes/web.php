<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Product\ProductController;
use App\Models\WordModel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'v1'], function() {
    Route::group(['prefix' => 'product'], function() {
        Route::get('get-all-product', [ProductController::class, 'getAll']);
        Route::post('get-product', [ProductController::class, 'getProductById']);
        Route::post('save-product', [ProductController::class, 'save'])->name('product.save');
        Route::delete('delete-product', [ProductController::class, 'delete'])->name('product.delete');
    });
});

Route::get('read-file', function() {
    // return 1; $lines = file('file.txt', FILE_IGNORE_NEW_LINES);
    $read = file('..\public\word1.txt', FILE_IGNORE_NEW_LINES);
    foreach ($read as $line) {
        if($line != null) {
            echo $line."  ";
            // $word = new WordModel;
            // $word->word = $line;
            // $word->save();
        }
    }
});