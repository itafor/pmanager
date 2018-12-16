<?php

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



Route::get('/{name}', function () {
   return view('phonebook');
})->where('name','[A-Za-z]+');

Route::resource('/phonebook', 'PhonebookController');
Route::post('/getBooks', 'PhonebookController@getBooks');


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function(){

Route::resource('companies', 'CompaniesController');
Route::get('projects/create/{company_id?}', 'ProjectsController@create');
Route::POST('projects/adduser', 'ProjectsController@adduser')->name('projects.adduser');
Route::resource('projects',  'ProjectsController');
Route::resource('tasks', 'TasksController');
Route::resource('roles', 'RolesController');
Route::resource('user', 'UsersController'); 
Route::resource('comments', 'CommentsController');
Route::get('dynamic_dropdown', 'DynamicDependent@index')->name('dynamic_dropdown.index');
Route::POST('dynamicdependent', 'dynamicdependent@fetch')->name('dynamicdependent.fetch');
Route::get('/livesearch', 'LiveSearchController@index')->name('livesearch.index');
Route::get('/live_search/action', 'LiveSearchController@action')->name('live_search.action');
Route::get('dynamicpdf', 'DynamicPDFController@index')->name('dynamicpdf.index');
Route::get('dynamic_pdf/pdf', 'DynamicPDFController@pdf')->name('dynamic_pdf.pdf');

Route::get('/students','StudentController@index')->name('students.index');;
Route::get('/students/read-data','StudentController@readData');
Route::post('/students/store','StudentController@store');
Route::post('/students/destroy','StudentController@destroy');
Route::get('/student/edit','StudentController@edit');
Route::post('/student/update','StudentController@update');


Route::get('/contact','ContactController@creatContact');
Route::post('/contactUs','ContactController@store')->name('contact.store');

});
Route::get('/invoice','InvoiceController@index');
Route::get('/findPrice','InvoiceController@insert')->name('findPrice');
Route::post('/insert','InvoiceController@insert')->name('insert');
