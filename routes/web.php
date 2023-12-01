<?php

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
// Route::get('/test/{id}', function ($ids) {
//     return "the ID is: $ids";
// });
// Route::get('/test1/{id?}', function ($ids=0) {
//     return "the ID is: $ids";
// });

// Route::get('/test2/{id?}', function ($ids=0) {
//     return "the ID is: $ids";
// })->whereNumber(['id']);

// Route::get('/test3/{name?}', function ($name=null) {
//     return "the name is: $name";
// })->whereAlpha(['name']);

// Route::get('/test4/{age}/{name}', function ($agevalue,$namevalue) {
//     return "the age is: $agevalue and name is: $namevalue" ;
// })->where(['name'=>"[a-zA-Z0-9]+",'age'=>"[0-9]+"]);

// Route::get('/product/{category}', function ($cat) {
//     return "the category  is: $cat" ;
// })->whereIn("category",['pc','laptop']);
Route::get('food', function () {
    return view("food");
});
Route::get('about', function () {
    return view("about");
});
Route::get('contact_us', function () {
    return view("contact_us");
});

Route::prefix("blog")->group(function(){
    Route::get('/', function () {
        return view("blog");
    });
    Route::get('math', function () {
        return view("math");
    });
    Route::get('medical', function () {
        return view("medical");
    });
    Route::get('science', function () {
        return view("science");
    });
    Route::get('sport', function () {
        return view("sport");
    });
   
});
// Route::fallback(function(){
//     return redirect('/');
// });
