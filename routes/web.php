<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
        //truy vấn lấy tất
        $data =Posts::all()->toArray();
        $data = Posts::query()->get();
        //where
        $data = Posts::query()->where('id', '>=1', '1')->get();
    
        //them
    //c1
        // $posts = new Posts();
        // $posts->title = "Welcome";
        // $posts->content = "Hello World";
        // $posts->save();
    //c2
        // $posts = Posts::query()->create([
            //     'title' => "Welcome1",
            //     'content' => "Hello World1"
            // ]);
    
        //sua
        //c1
            // $posts = Posts::query()->find(2);
            // $posts->title = "Welcome 1";
            // $posts->content = "Hello World1";
            // $posts->save();
        //c2
        $posts = Posts::query()->find(2)->update([
                'title' => "Welcome 9",
                'content' => "Hello World 14"
            ]);
            //xoa
            //c1 cung
             $posts = Posts::query()->find(2)->delete();
        
            dd($data);
            return view('welcome');
        });
        
        Route::get('/products', [ProductController::class, 'index'])->name('product.index');
        Route::controller(ProductController::class)->name('product.')->prefix('products/')->group(function(){
            Route::get('/',  'index')->name('index');
            Route::get('create',  'create')->name('create');
            Route::post('store',  'store')->name('store');
            Route::get('{id}/edit',  'edit')->name('edit');
            Route::put('{id}/update',  'update')->name('update');
            Route::delete('{id}/delete',  'destroy')->name('destroy');
        });
        Route::controller(CategoryController::class)->name('category.')->prefix('category/')->group(function (){
            Route::get('/', 'index')->name('index');
            Route::get('create', 'create')->name('create');
            Route::post('store', 'store')->name('store');
            Route::get('{id}/edit', 'edit')->name('edit');
            Route::put('{id}/update', 'update')->name('update');
            Route::delete('{id}/destroy', 'destroy')->name('destroy');
        });