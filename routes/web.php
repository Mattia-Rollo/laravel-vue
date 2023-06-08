<?php

use App\Http\Controllers\JobseekerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TypeUserController;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {

    if (Auth::user()->type_user) {
        if (!session()->has('login')) {
            session()->flash('message', 'Login effettuato con successo');
            session()->put('login', true);
        }

        if (Auth::user()->type_user == 'jobseeker') {
            return Inertia::render('Jobseeker/Dashboard');
        } elseif (Auth::user()->type_user == 'employer') {
            return Inertia::render('Employers/Dashboard');
        }

    } else {

        return Inertia::render('RegisterTypeUser');
        // return Inertia::render('Dashboard');
    }

})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/registertype', function () {
//     return Inertia::render('RegisterTypeUser');
// })->name('registertype');


// Route::resource('/registerTypeUser', TypeUserController::class)->except('create', 'show', 'edit');

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/annunci', function () {
        if (Auth::user()->type_user === 'jobseeker') {

            return Inertia::render('Jobseeker/Advertises');

        } elseif (Auth::user()->type_user == 'employer') {

            return Inertia::render('Employers/Dashboard');
        }

    })->name('annunci');

    Route::resource('/curriculum', JobseekerController::class)->parameters(['jobseeker' => 'jobseeker:id'])->middleware('jobseeker');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




// if(Auth::user()->autority()){
//     return view('dashboardAutority');
// }
// if(Auth::company()){
//     return view('dashboardCompany');
// }
// if(Auth::user()){
//     return view('dashboardUser');
// }