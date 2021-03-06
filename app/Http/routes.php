<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {
    Route::get('/', 'PagesController@home');
//    Route::get('/', function(){
//        return Redirect::to('/index.php');
//    });

    Route::get('users', 'UsersController@index');
    Route::get('users/{id?}/edit', 'UsersController@edit');
    Route::post('users/{id?}/edit','UsersController@update');

    Route::get('/users/excel', 'UsersController@excel');
    Route::get('/users/screen', 'UsersController@screen2pdf');
    Route::get('/users/pdf', 'UsersController@report2pdf');

    Route::get('roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');

    Route::get('posts', 'PostsController@index');
    Route::get('posts/create', 'PostsController@create');
    Route::post('posts/create', 'PostsController@store');
    Route::get('posts/{id?}/edit', 'PostsController@edit');
    Route::post('posts/{id?}/edit','PostsController@update');

    Route::get('categories', 'CategoriesController@index');
    Route::get('categories/create', 'CategoriesController@create');
    Route::post('categories/create', 'CategoriesController@store');
});

Route::get('/blog', 'BlogController@index');
Route::get('/blog/{slug?}', 'BlogController@show');

Route::get('/', 'PagesController@home');
Route::get('/home', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');
Route::get('/tickets', 'TicketsController@index');
Route::get('/ticket/{slug?}', 'TicketsController@show');
Route::get('/ticket/{slug?}/edit','TicketsController@edit');
Route::post('/ticket/{slug?}/edit','TicketsController@update');
Route::post('/ticket/{slug?}/delete','TicketsController@destroy');

Route::post('/comment', 'CommentsController@newComment');

//Route::get('home', 'HomeController@index');

Route::get('sendemail', function ()
{
    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message)
    {
        $message->from(env('EMAIL_ADDRESS'), 'Learning Laravel');
        $message->to('kennthompson@gmail.com')->subject('Learning Laravel test email');
    });

    return "Your email has been sent successfully";
});

Route::get('/users/login', 'Auth\AuthController@getLogin');
Route::post('/users/login', 'Auth\AuthController@postLogin');
Route::get('/users/logout', 'Auth\AuthController@getLogout');
Route::get('/users/register', 'Auth\AuthController@getRegister');
Route::post('/users/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
Route::get('audits', 'AuditTrailsController@index');
Route::get('queries', 'PagesController@queries');
Route::get('slowQueries', 'PagesController@slowQueries');

//Accounting
Route::get('glcoas', 'GlcoasController@index');
Route::get('glcoa/init', 'GlcoasController@checkInit');
Route::get('glcoa/create', 'GlcoasController@create');
Route::post('glcoa/create', 'GlcoasController@store');
Route::get('glcoa/{id?}/edit', 'GlcoasController@edit');
Route::post('glcoa/{id?}/edit', 'GlcoasController@update');
Route::get('glcoa/{id?}/show', 'GlcoasController@show');
Route::get('glcoa/{id?}/delete', 'GlcoasController@destroy');
Route::get('glcoa/detail', 'GlcoasController@detail');
Route::get('glcoa/excel', 'GlcoasController@glcoaExcel');
Route::get('glcoa/pdf', 'GlcoasController@glcoaPdf');

Route::get('gltrns', 'GltrnsController@index');
Route::get('gltrn/create', 'GltrnsController@create');
Route::post('gltrn/create', 'GltrnsController@store');
Route::get('gltrn/{id?}/edit', 'GltrnsController@edit');
Route::post('gltrn/{id?}/edit', 'GltrnsController@update');
Route::get('gltrn/{id?}/show', 'GltrnsController@show');
Route::get('gltrn/{id?}/delete', 'GltrnsController@destroy');

//Recipes
Route::get('recipes', 'RecipesController@index');
Route::get('recipes/menu', 'RecipesController@menu');
Route::get('recipe/create', 'RecipesController@create');
Route::post('recipe/create', 'RecipesController@store');
Route::get('recipe/{id?}/edit', 'RecipesController@edit');
Route::post('recipe/{id?}/edit', 'RecipesController@update');
Route::get('recipe/{id?}/delete', 'RecipesController@destroy');
Route::get('recipe/{id?}/pdf', 'RecipesController@recipePdf');
Route::get('recipe/{id?}/show', 'RecipesController@show');
Route::get('recipes/excel', 'RecipesController@recipesExcel');
Route::get('recipes/html/{offset}/{limit}', 'RecipesController@recipesHtml');
Route::get('recipes/pdf/{offset}/{limit}', 'RecipesController@recipesPdf');
Route::post('recipes/search/', 'RecipesController@search');
Route::post('recipes/fix/', 'RecipesController@fix');
Route::get('api/recipes/get', 'RecipesController@get');

//Counties
Route::get('counties', 'CountiesController@index');
Route::get('county/create', 'CountiesController@create');
Route::post('county/create', 'CountiesController@store');
Route::get('county/{id?}/edit', 'CountiesController@edit');
Route::post('county/{id?}/edit', 'CountiesController@update');
Route::get('county/{id?}/show', 'CountiesController@show');
Route::get('county/{id?}/delete', 'CountiesController@destroy');
Route::get('county/excel', 'CountiesController@excel');
Route::post('counties/search/', 'CountiesController@search');
Route::get('api/counties/get', 'CountiesController@get');

//States
Route::get('states', 'StatesController@index');
Route::get('state/create', 'StatesController@create');
Route::post('state/create', 'StatesController@store');
Route::get('state/{id?}/edit', 'StatesController@edit');
Route::post('state/{id?}/edit', 'StatesController@update');
Route::get('state/{id?}/show', 'StatesController@show');
Route::get('state/{id?}/delete', 'StatesController@destroy');
Route::get('state/excel', 'StatesController@excel');
Route::get('api/states/get', 'StatesController@get');

//Zipcodes
Route::get('zipcodes', 'ZipcodesController@index');
Route::get('zipcode/create', 'ZipcodesController@create');
Route::post('zipcode/create', 'ZipcodesController@store');
Route::get('zipcode/{id?}/edit', 'ZipcodesController@edit');
Route::post('zipcode/{id?}/edit', 'ZipcodesController@update');
Route::get('zipcode/{id?}/show', 'ZipcodesController@show');
Route::get('zipcode/{id?}/delete', 'ZipcodesController@destroy');
Route::get('zipcode/excel', 'ZipcodesController@excel');
Route::post('zipcodes/search/', 'ZipcodesController@search');
Route::get('api/zips/get', 'ZipcodesController@get');

//Vendors
Route::get('vendors', 'VendorsController@index');
Route::get('vendor/create', 'VendorsController@create');
Route::post('vendor/create', 'VendorsController@store');
Route::get('vendor/{id?}/edit', 'VendorsController@edit');
Route::post('vendor/{id?}/edit', 'VendorsController@update');
Route::get('vendor/{id?}/show', 'VendorsController@show');
Route::get('vendor/{id?}/delete', 'VendorsController@destroy');
Route::get('vendor/excel', 'VendorsController@excel');

//Customers
Route::get('customers', 'CustomersController@index');
Route::get('customer/create', 'CustomersController@create');
Route::post('customer/create', 'CustomersController@store');
Route::get('customer/{id?}/edit', 'CustomersController@edit');
Route::post('customer/{id?}/edit', 'CustomersController@update');
Route::get('customer/{id?}/show', 'CustomersController@show');
Route::get('customer/{id?}/delete', 'CustomersController@destroy');
Route::get('customer/excel', 'CustomersController@excel');

//Trucks
Route::get('trucks', 'TrucksController@index');
Route::get('truck/create', 'TrucksController@create');
Route::post('truck/create', 'TrucksController@store');
Route::get('truck/{id?}/edit', 'TrucksController@edit');
Route::post('truck/{id?}/edit', 'TrucksController@update');
Route::get('truck/{id?}/show', 'TrucksController@show');
Route::get('truck/{id?}/delete', 'TrucksController@destroy');
Route::get('truck/excel', 'TrucksController@excel');

//Commodities
Route::get('commodities', 'CommoditiesController@index');
Route::get('commodity/create', 'CommoditiesController@create');
Route::post('commodity/create', 'CommoditiesController@store');
Route::get('commodity/{id?}/edit', 'CommoditiesController@edit');
Route::post('commodity/{id?}/edit', 'CommoditiesController@update');
Route::get('commodity/{id?}/show', 'CommoditiesController@show');
Route::get('commodity/{id?}/delete', 'CommoditiesController@destroy');
Route::get('commodity/excel', 'CommoditiesController@excel');

//Inbounds
Route::get('inbounds', 'InboundsController@index');
Route::get('inbound/create', 'InboundsController@create');
Route::post('inbound/create', 'InboundsController@store');
Route::get('inbound/{id?}/edit', 'InboundsController@edit');
Route::post('inbound/{id?}/edit', 'InboundsController@update');
Route::get('inbound/{id?}/show', 'InboundsController@show');
Route::get('inbound/{id?}/delete', 'InboundsController@destroy');
Route::get('inbound/excel', 'InboundsController@excel');

//Outbounds

//Dprs

//Farmers
Route::get('farmers', 'FarmersController@index');
Route::get('farmer/create', 'FarmersController@create');
Route::post('farmer/create', 'FarmersController@store');
Route::get('farmer/{id?}/edit', 'FarmersController@edit');
Route::post('farmer/{id?}/edit', 'FarmersController@update');
Route::get('farmer/{id?}/show', 'FarmersController@show');
Route::get('farmer/{id?}/delete', 'FarmersController@destroy');
Route::get('farmer/excel', 'FarmersController@excel');

//Farms
Route::get('farms', 'FarmsController@index');
Route::get('farm/create', 'FarmsController@create');
Route::post('farm/create', 'FarmsController@store');
Route::get('farm/{id?}/edit', 'FarmsController@edit');
Route::post('farm/{id?}/edit', 'FarmsController@update');
Route::get('farm/{id?}/show', 'FarmsController@show');
Route::get('farm/{id?}/delete', 'FarmsController@destroy');
Route::get('farm/excel', 'FarmsController@excel');

//Mccs
Route::get('mccs', 'MccsController@index');
Route::get('mcc/create', 'MccsController@create');
Route::post('mcc/create', 'MccsController@store');
Route::get('mcc/{id?}/edit', 'MccsController@edit');
Route::post('mcc/{id?}/edit', 'MccsController@update');
Route::get('mcc/{id?}/show', 'MccsController@show');
Route::get('mcc/{id?}/delete', 'MccsController@destroy');
Route::get('mcc/excel', 'MccsController@excel');
Route::get('mcc/{id?}/rating', 'MccsController@rating');
Route::get('mcc/ratings', 'MccsController@ratings');
Route::post('mccs/search/', 'MccsController@search');
Route::get('api/mccs/get', 'MccsController@get');

//Quotes
Route::get('quotes', 'QuotesController@index');
Route::get('quote/create', 'QuotesController@create');
Route::post('quote/create', 'QuotesController@store');
Route::get('quote/{id?}/edit', 'QuotesController@edit');
Route::post('quote/{id?}/edit', 'QuotesController@update');
Route::get('quote/{id?}/show', 'QuotesController@show');
Route::get('quote/{id?}/delete', 'QuotesController@destroy');
Route::get('quote/excel', 'QuotesController@excel');
Route::post('quotes/search/', 'QuotesController@search');
Route::get('api/quotes/get', 'QuotesController@get');

//Articles
Route::get('games', 'GamesController@index');
Route::get('game/create', 'GamesController@create');
Route::post('game/create', 'GamesController@store');
Route::get('game/{id?}/edit', 'GamesController@edit');
Route::post('game/{id?}/edit', 'GamesController@update');
Route::get('game/{id?}/show', 'GamesController@show');
Route::get('game/{id?}/delete', 'GamesController@destroy');
Route::get('game/excel', 'GamesController@excel');
Route::get('games/import', 'GamesController@import');
Route::post('games/import', 'GamesController@imports');
Route::post('games/search/', 'GamesController@search');
Route::get('games/search_form/', 'GamesController@search_form');
Route::post('games/search_form/', 'GamesController@search');
Route::get('games/html/', 'GamesController@html');
Route::get('games/fix', 'GamesController@fix');
Route::get('games/parse', 'GamesController@parse');
Route::get('api/games/getgames', 'GamesController@getgames');

//ECO
Route::get('ecos', 'EcosController@index');
Route::get('eco/create', 'EcosController@create');
Route::post('eco/create', 'EcosController@store');
Route::get('eco/{id?}/edit', 'EcosController@edit');
Route::post('eco/{id?}/edit', 'EcosController@update');
Route::get('eco/{id?}/show', 'EcosController@show');
Route::get('eco/{id?}/delete', 'EcosController@destroy');
Route::get('eco/excel', 'EcosController@excel');
Route::post('ecos/search/', 'EcosController@search');
Route::get('api/ecos/get', 'EcosController@get');

//AngularJS
Route::get('/posts/last/{n?}', 'PostController@last');