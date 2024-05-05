<?php
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     $name = session('name');

//     return view('catalogue')->with('name',$name);
// })->name('catalogue');
Route::get('/myreceipt', [ItemController::class, 'myreceipt'])->name('myreceipt');
Route::get('/catalogue', [ItemController::class, 'catalogue'])->name('catalogue');
Route::get('/finalize', [ItemController::class, 'finalize'])->name('finalize');
Route::post('/myreceipt', [ItemController::class, 'finalOrder'])->name('finalOrder');

Route::post('/add_cart/{id}', [ItemController::class, 'add_cart'])->name('add_cart');

Route::get('/item/add',[ItemController::class,'addPage'])->name('addPage');
Route::get('/item/view',[ItemController::class,'viewPage'])->name('viewPage');
Route::post('/item/store',[ItemController::class,'store'])->name('store');
Route::get('/item/edit/{id}',[ItemController::class,'editPage'])->name('editPage');
Route::patch('/item/update/{id}',[ItemController::class,'updateItem'])->name('updateItem');
Route::delete('/item/delete/{id}',[ItemController::class,'deleteItem'])->name('deleteItem');
Route::delete('item/delete-image/{id}',[ItemController::class,'delete_image'])->name('delete_image');
Route::get('/category',[CategoryController::class,'category_page'])->name('category_page');

Route::get('/item/add-supplier/{id}',[ItemController::class,'add_supplier_page'])->name('add_supplier_page');
Route::post('/item/add-supplier/{id}',[ItemController::class,'add_supplier'])->name('add_supplier');

Route::get('/category/add',[CategoryController::class,'add_category_page'])->name('add_category_page');
Route::post('/category/add',[CategoryController::class,'add_category'])->name('add_category');
Route::delete('/category/delete/{id}',[CategoryController::class,'delete_category'])->name('delete_category');

Route::get('/register',[UserController::class,'registerPage'])->name('registerPage');

Route::post('/register',[UserController::class,'register'])->name('register');

Route::get('/login',[UserController::class,'loginPage'])->name('loginPage');
Route::post('/login',[UserController::class,'login'])->name('login');

Route::post('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/adminLogin',[UserController::class,'adminLogin'])->name('adminLogin');
Route::post('/adminLogin',[UserController::class,'adminOnly'])->name('adminOnly');


