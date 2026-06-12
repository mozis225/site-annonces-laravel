
<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;

Route::get('/', function () {
    return view('welcome');
});

// sign_up
Route::get('/register', [AuthController::class, 'showSignup'])->name('register');
Route::post('/register', [AuthController::class, 'signUp'])->name('registration.register');

//login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

//logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



//Page d'accueil
Route::get('/', [HomeController::class, 'index'])->name('home');

//Routes du CRUD
Route::get('/ads',[AdController::class, 'index'])->name('ads.index');


Route::middleware(['auth'])->group(function(){
    Route::get('/ads/create', [AdController::class, 'create'])->name('ads.create');
    Route::post('/ads', [AdController::class,'store'])->name('ads.store');
    Route::get('/ads/{ad}/edit', [AdController::class, 'edit'])->name('ads.edit');
    Route::put('/ads/{ad}', [AdController::class, 'update'])->name('ads.update');
    Route::delete('/ads/{ad}', [AdController::class, 'destroy'])->name('ads.destroy');
});

Route::get('/ads/{ad}',[AdController::class,'show'])->name('ads.show');