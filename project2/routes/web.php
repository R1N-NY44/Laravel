<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Mail\OrderShipped;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

// Route::group(['middleware' => 'authCheck'], function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
//     Route::get('/profile', function () {
//         return view('profile');
//     })->name('profile');
// });

Route::get('/user-data', function () {
    // return Auth::user();
    return auth()->user();
});

Route::get('/posts/trash', [PostController::class, 'trashed'])->name('posts.trashed');
Route::get('/posts/{id}/restore', [PostController::class, 'restore'])->name('posts.restore');
Route::delete('/posts/{id}/force-delete', [PostController::class, 'forceDelete'])->name('posts.force_delete');
Route::get('/unavailable', function () {
    return view('unavailable');
})->name('unavailable');

Route::get('/contact', function () {
    $posts = Post::all();
    return view('contact', compact('posts'));
});

Route::get('/send-mail', function () {
    // Mail::raw('Hello dudehh', function ($message) {
    //     $message->to('ramadhan.abdul.aziz14@gmail.com')->subject('noreplay');
    // });

    $anjay = Mail::send(new OrderShipped);
    if ($anjay) {
        return response()->json('anjay berhasil');
    } else {
        return response()->json('anjay gagal');
    }
});


////////////////////////////////////////////////////////////////
// session route demo
Route::get('/get-session', function (Request $request) {
    // $data = session()->all();
    $data = $request->session()->all();
    dd($data);
});

Route::get('/save-session', function (Request $request) {
    // $request->session()->put(['user_status' => 'logged_in']);
    session(['user_id' => "123"]);
    return redirect('get-session');
});

Route::get('/destroy-session', function (Request $request) {
    $request->session()->forget('user_status'); // use array to destroy multiple sessions
    // session()->forget('user_id');
    // session()->flush(); Delete all sessions
    return redirect('get-session');
});

Route::get('/flash-session', function (Request $request) {
    session()->flash("status", 'true ');
    return redirect('get-session');
});

////////////////////////////////////////////////////////////////
// cache routes demo
Route::get('/forget-chace', function () {
    Cache::forget('posts');
});

Route::resource('posts', PostController::class);
