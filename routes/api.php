<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Blog\BlogController;
use App\Http\Controllers\Word\WordController;
use App\Http\Controllers\Pronounce\PronounceController;
use App\Http\Controllers\WordMean\WordMeanController;
use App\Http\Controllers\TypeWord\TypeWordController;

use Modules\ExplorerManager\Http\Controllers\Explorer\ExplorerController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'product'], function () {
        Route::get('get-all-product', [ProductController::class, 'getAll']);
        Route::post('get-product', [ProductController::class, 'getProductById']);
        Route::post('save-product', [ProductController::class, 'save'])->name('product.save');
        Route::post('delete-product', [ProductController::class, 'delete'])->name('product.delete');
    });

    Route::group(['prefix' => 'blog'], function () {
        Route::get('get-all-blog', [BlogController::class, 'getAll']);
        Route::post('get-blog', [BlogController::class, 'getBlogById']);
        Route::post('save-blog', [BlogController::class, 'save'])->name('blog.save');
        Route::post('delete-blog', [BlogController::class, 'delete'])->name('blog.delete');
    });

    Route::group(['prefix' => 'word'], function () {
        Route::get('get-all-word', [WordController::class, 'getAll']);

        Route::post('get-word-by-id', [WordController::class, 'getWordById']);

        Route::post('get-word-paginate', [WordController::class, 'getWordPaginate']);

        Route::post('get-type-word', [WordController::class, 'getTypeWord']);

        Route::post('save-word', [WordController::class, 'save'])->name('word.save');

        Route::post('delete-word', [WordController::class, 'delete'])->name('word.delete');

        Route::post('save-example', [WordController::class, 'saveExample'])->name('');

        Route::post('save-vie-word-mean-by-type-word', [WordController::class, 'saveVieWordMeanByTypeWord'])->name('');

        Route::post('save-eng-word-mean-by-type-word', [WordController::class, 'saveEngWordMeanByTypeWord'])->name('');

        Route::post('save-eng-word-mean', [WordController::class, 'saveEngWordMean'])->name('');

        Route::post('save-word-mean-popularity', [WordController::class, 'saveWordMeanPopularity'])->name('');
    });

    Route::group(['prefix' => 'pronounce'], function () {
        Route::get('get-pronounce', [PronounceController::class, 'getPronounce']);
        Route::post('save-pronounce', [PronounceController::class, 'savePronounce']);
        // Route::post('save-pronounce', function () {
        //     return 1;
        // });
    });

    Route::group(['prefix' => 'word-mean'], function () {
        Route::get('get-word-mean', [WordMeanController::class, 'getWordMean']);
        Route::post('save-word-mean', [WordMeanController::class, 'saveWordMean']);
    });

    Route::post('get-data', [BlogController::class, 'getAll']);

    Route::get('get-type-word', [TypeWordController::class, 'getTypeWord']);
});

Route::post('explorer', [ExplorerController::class, 'create']);
