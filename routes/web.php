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

Route::get('/', 'Web\PageController@investigation_groups')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Product
Route::resource('products', 'Product\productController');

//Admin
Route::resource('users','Admin\UserController');

//Project
Route::resource('projects','Project\ProjectController');

//Investigation group
Route::resource('investigationGroups','InvestigationGroup\InvestigationGroupController');

//Research
Route::resource('researchers', "Researcher\ResearcherController");

//Unit
Route::resource('units',"Unit\UnitController");