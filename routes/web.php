<?php

use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('home', ["title" => "Home"]);
});
Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "nama" => "Muhammad Dhaiful Imam",
        "email" => "dhaifulimam@email.com",
        "img" => "foto.JPG"
    ]);
});



Route::get('/blog', [PostController::class, 'index']);

Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function (Category $category) {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});


// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => "Post By Category : $category->name",
//         'post' => $category->posts->load('author', 'category'),
//     ]);
// });

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => "Post By : $author->name",
//         'post' => $author->Post->load('author', 'category')
//     ]);
// });


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', fn () => view('dashboard.index'))->middleware('auth');

Route::resource('/dashboard/blog', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->middleware('admin');
