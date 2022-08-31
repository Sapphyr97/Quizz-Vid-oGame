<?php

use Illuminate\Support\Facades\Route;

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

// On crée une route avec la méthode GET
// La route spécifié en argument est la slash de départ; donc l'accueil
// Route::get('/', function () {
//     // La route / va retourner la vue home.blade.php du dossier views
//     return view('home');
//     // return 'Hello world';
// });

// // On crée une route avec la méthode GET
// // La route spécifié en argument est /toto
// Route::get('/toto', function () {
//     // La route /toto va retourner la vue toto.blade.php du dossier views
//     return view('toto',
//         // la route /toto retourne également un tableau avec une clé
//         // cette clé est transmise à la vue en tant que variable
//         // name sera une variable dans la vue toto.blade.php contenant 'Tata'
//         [
//             'name' => 'Tata',
//             'name2' => 'Titi'
//         ]
//     );
// });

Route::get('toto', 'App\Http\Controllers\TotoController@totoAction')->name('toto');
Route::get('tata', 'App\Http\Controllers\TotoController@tataAction')->name('tataUrl');

Route::get('/', 'App\Http\Controllers\MainController@homeAction')->name('home');
Route::get('admin', 'App\Http\Controllers\AdminController@homeAction')->name('admin');
Route::post('admin/create_videogame', 'App\Http\Controllers\AdminController@createVideogameAction')->name('admin_create_videogame');
Route::get('signup', 'App\Http\Controllers\UserController@signupAction')->name('signup');
Route::post('signup/create_user', 'App\Http\Controllers\UserController@createUserAction')->name('signup_create_user');
Route::get('signin', 'App\Http\Controllers\UserController@signinAction')->name('signin');
Route::post('signin', 'App\Http\Controllers\UserController@signinUserAction')->name('signin_user');
Route::post('signout', 'App\Http\Controllers\UserController@signoutAction')->name('signout');
Route::post('/delete_videogame/{id}', 'App\Http\Controllers\MainController@deleteVideogameAction')->name('delete_videogame');
Route::get('/edit_videogame/{id}', 'App\Http\Controllers\MainController@editVideogameAction')->name('edit_videogame');
Route::post('update_videogame/{id}', 'App\Http\Controllers\MainController@updateVideogameAction')->name('update_videogame');




