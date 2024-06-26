<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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
    // return view('welcome');
    // select 
    // $users = DB::select('select * from users');
    // $users = DB::select('select * from users where email=?',['mohammad@gmail.com']);
    // dd($users);

    // inser 
    // $users = DB::insert('insert into users(name,email,password) values(?,?,?)',['Ahmad','ahmad2@gmail.com','123456789']);
    // dd($users);

    // update 
    // $users = DB::update("update users set email='abc@gmail.com' where id=1");
    // dd($users);

    // delete 
    // $users = DB::delete('delete from users where id=1');
    // dd($users);

    // query builder 
    // select or get data 
    // $users = DB::table('users')->get();
    // $users = DB::table('users')->where('id', 4)->get();
    // dd($users);

    // insert 
    // $users = DB::table('users')->insert([
    //     'name' => 'Amir',
    //     'email' => 'amir@gmail.com',
    //     'password' => 'password',
    // ]);
    // dd($users);

    // update 
    // $users = DB::table('users')->where('id', 6)->update(['email' => 'ksjdhdskj@gmail.com']);
    // dd($users);

    // delete 
    // $users = DB::table('users')->where('id', 6)->delete();
    // dd($users);

    // elequent orm 
    // select or get 
    // $users = User::where('id', 7)->first();
    // dd($users);

    // create or insert 
    // $users = User::create(['name' => 'kaber', 'email' => 'kabir@gmail.com', 'password' => 'password']);
    // dd($users);

    // update 
    // $users = User::where('id', 8)->first();
    // $users = User::find(7);
    // $users->update([
    //     'email'=>'my1@gmail.com',
    // ]);
    // dd($users);

    // delete
    // $users = User::find(7);
    // $users->delete();
    // dd($users);

    $users = User::create([
        'name'=>'Omid',
        'email'=>'omid@gmail.com',
        'password'=>bcrypt('12345'),
    ]);
    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
