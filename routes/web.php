<?php

use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('login', function () {
    return view('pages.auth.login');
})->name('login')->middleware('guest');

Route::get('logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');

Route::post('login', function (Request $request) {
    $credential = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);
   if (Auth::attempt($credential)) {
    return redirect()->route('dashboard');
   }
   return redirect()->back()->withErrors(['login_fail' => 'You have wrong credential']);

})->name('login.submit');

Route::get('set-login/{user}', function (User $user) {
    if (Auth::loginUsingId($user->id)) {
        return 'User Successfully Login: ' . Auth::user()->name;
    }
    abort(403);
});

Route::get('/', [App\Http\Controllers\WebsiteController::class, 'index'])->name('index');
Route::get('about', [App\Http\Controllers\WebsiteController::class, 'about'])->name('about');
Route::get('contact', [App\Http\Controllers\WebsiteController::class, 'contact'])->name('contact');
Route::get('services', [App\Http\Controllers\WebsiteController::class, 'services'])->name('services');
Route::get('blog', [App\Http\Controllers\WebsiteController::class, 'blog'])->name('blog');
Route::get('shop', [App\Http\Controllers\WebsiteController::class, 'shop'])->name('shop');

Route::get('posts/{post}/comments', [App\Http\Controllers\PostController::class, 'comments']);

Route::group(['middleware' => ['auth', 'secod', 'thrd']], function () {
    Route::get('posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('posts.create')
    ->middleware('post-create')->withoutMiddleware(['auth']);
    Route::get('dashboard', function () {
        return view('pages.dashboard.index');
    })->name('dashboard');
});

Route::resource('posts', App\Http\Controllers\PostController::class)->except('create');


Route::get('posts-query', function (Request $request) {
    //    $posts = Post::query();
    $year = $request->year ?? 2022;
    $yearly = Post::select(DB::raw('strftime("%Y", created_at) as year'), DB::raw('count(*) as total'))->groupBy('year')->get();
    $monthly = Post::select(DB::raw('strftime("%m", created_at) as month'), DB::raw('count(*) as total'))->whereYear('created_at', $year)->groupBy('month')->get();
    $monthly = $monthly->map(function ($item) {
        $item->month = Carbon::create()->month((int) $item->month)->format('F');
        return $item;
    });
    return view('pages.posts.report')->with([
        'yearly' => $yearly,
        'monthly' => $monthly,
        'year' => $year
    ]);
});
