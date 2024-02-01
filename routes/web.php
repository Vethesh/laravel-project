<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Http\Controllers\Profile\AvatarController;


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
    
    //  db facedes
    // select query
    // $users = DB::select("select * from users");
    // $users = DB::select("select * from users where email=?", ['vetheshkumar7@gmail.com']);

    // // insert query
    // $users = DB::insert("insert into users(name,email,password) values (?,?,?)",['krishna','krishna@gmail.com','password']);

    // update query
    // $user = DB::update("update users set email='preetham@gmail.com' where id=2");

    //delete query
    // $user = DB::delete("delete from users where id=2");





    // query builder

    // $users = DB::table('users')->where('id',1)->get();

    //  $users = DB::table('users')->first();

    // $users= DB::table('users')->insert([
    //     'name' => 'sagar',
    //     'email' => 'sagar1@gmail.com',
    //     'password' => 'password',
    // ]);
   



    // eloquent an object relational mapper(orm)
    // $users = User::where('id',1)->first();

    // create using eloquent orm

    //   
    

    // update using eloquent orm

    // $users = User::where('id',4)->first();
    // $users->update(
    //     ['email'=>'sagar69@gmail.com']
    // );

    // delete using eloquent orm
    // $users = User::find(4);
    // $users->delete();
    // dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profilr/avatar', [AvatarController::class,'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
  