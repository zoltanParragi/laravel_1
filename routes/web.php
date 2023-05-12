<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AddUserController;
use App\Http\Controllers\GetUserController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Product;

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
    return view('welcome');
});

/* Route::post('/', function () {
    dump( Request::all() );
}); */

Route::post('/', [UserController::class, 'register']);

Route::get('/myroute', function () {
    return view('myroute');
});

Route::get('/blade', function () {
    return view('blade', ['data' => 'Something to pass.']);
});

Route::get('/users', function () {
    foreach(User::where('id', '>', 50)->where('id', '<', 55)->get() as $user) {
        dump($user->name);
    }
});

Route::get('/products', function () {
    return view('products');
});

Route::post('/products', [ProductController::class, 'getproducts']);

Route::get('/getusers', [GetUserController::class, 'getusers']);

Route::get('/addusers', [GetUserController::class, 'getuser2s']);

Route::post('/addusers', [AddUserController::class, 'adduser']);