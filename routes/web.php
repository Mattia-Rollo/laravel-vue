<?php

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

            // dd(session());
            // Set the success message to be displayed
            session()->flash('message', 'Bravo ti sei loggato!');
            // Set the logged_in session variable to true
            session()->put('login', true);
        }
        if (Auth::user()->type_user == 'Utente') {

            return Inertia::render('Dashboard/Dashboard');
        } elseif (Auth::user()->type_user == 'Azienda') {
            return Inertia::render('DashboardAzienda');
        }
    } else {
        return Inertia::render('RegisterTypeUser');
        // return Inertia::render('Dashboard');
    }

})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/registertype', function () {
    return Inertia::render('RegisterTypeUser');
})->name('registertype');


// Route::resource('/registerTypeUser', TypeUserController::class)->except('create', 'show', 'edit');

Route::middleware('auth')->group(function () {
    Route::get('/offerte', function () {
        if (Auth::user()->type_user == 'Utente') {

            return Inertia::render('Dashboard/OfferteDiLavoro');
        } elseif (Auth::user()->type_user == 'Azienda') {
            return Inertia::render('DashboardAzienda');
        }
    })->name('offerte');
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