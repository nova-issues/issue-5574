<?php

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

    $queryCallback = fn ($query) => $query->where('created_at', '<', now()->subDays(1));

    dump(
        'database', App\Models\User::search('example')->query($queryCallback)->take(200)->paginate(25)->items()
    );


    dump(
        'meilisearch', App\Models\UserWithMeilisearch::search('example')->query($queryCallback)->take(200)->paginate(25)->items()
    );

    dump(
        'algolia', App\Models\UserWithAlgolia::search('example')->query($queryCallback)->take(200)->paginate(25)->items()
    );
});
