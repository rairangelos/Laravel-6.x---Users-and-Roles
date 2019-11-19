# Laravel-6.x---Users-and-Roles
Login system with roles - Laravel 6.x

## Authentication
<ol>
<li>composer require laravel/ui --dev</li>
<li>php artisan ui vue --auth</li>
</ol>


## Route
##### Dentro da web.php 

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes();

    Route::get('/home', 'HomeController@index')->name('home');

    Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
        Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);
    });

## Migrations
Roda o seguinte comando no terminal: **php artisan migrate** para gerar as tabelas da aplicação

## AuthServiceProvider
##### Dentro da function boot

        Gate::define('manage-users', function($user){
            return $user->hasAnyRoles(['admin', 'god']);
        });

        Gate::define('edit-users', function($user){
            return $user->hasRoles('admin');
        });

        Gate::define('delete-users', function($user){
            return $user->hasAnyRoles(['admin', 'god']);
        });
