<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultiPhotoController;
use App\Models\User;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/faq', function () {
    return view('faq');
});

// Route::get('/about', function () {
//     return view('about');
// });
// Route::get('/blog', function () {
//     echo "This is Blog this page is age restriction";
// });

// Route::get('/about', function () {
//     return view('about');
// })->middleware('age');

// Route::get('/home', function () {
//     echo "This is Home Page";
// });

// Route::get('/contact',function(){
//     echo "This is contact page";
// });
// for laravel 7 format
// Route::get('/contact','ContactController@index');

Route::get('/contact-sldjfk-sldkjf',[ContactController::class, 'index'])->name('con');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// store route
Route::post('/category/add',[CategoryController::class, 'AddCat'])->name('store.category');
// category Controller
Route::get('/category/all',[CategoryController::class, 'AllCat'])->name('all.category');
// edit category
Route::get('/category/edit/{id}',[CategoryController::class, 'Edit']);
//update data
Route::post('/category/update/{id}',[CategoryController::class, 'Update']);
// softdelete
Route::get('/softdelete/category/{id}',[CategoryController::class, 'SoftDelete']); 
// restore
Route::get('/category/restore/{id}',[CategoryController::class, 'Restore']); 
//remove
Route::get('/remove/category/{id}',[CategoryController::class, 'Remove']); 


// For Brand route
Route::get('/brand/all',[BrandController::class, 'AllBrand'])->name('all.brand');
//add                     
Route::post('/brand/add',[BrandController::class, 'StoreBrand'])->name('store.brand');
//edit                     
Route::get('/brand/edit/{id}',[BrandController::class, 'EditBrand']);
//update
Route::post('/brand/update/{id}',[BrandController::class, 'Update']);
//delete
Route::get('/brand/delete/{id}',[BrandController::class, 'Delete']);


// For MultiImage Uplode 
Route::get('/multiimage/all',[MultiPhotoController::class, 'AllMultiImage'])->name('all.multiimage');
Route::post('/image/add',[MultiPhotoController::class, 'StoreImage'])->name('store.image');









Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // $users = User::all();
        $users = DB::table('users')->get();

        return view('dashboard',compact('users')); 
    })->name('dashboard');
});
