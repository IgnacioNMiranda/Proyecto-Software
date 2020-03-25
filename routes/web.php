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

Route::get('about_us','Web\PageController@showAbout')->name('ShowAbout_us');

//Product
Route::resource('products', 'Product\productController');

//Admin
Route::resource('users','Admin\UserController');

//Project
Route::resource('projects','Project\ProjectController');

//Investigation group
Route::resource('investigationGroups','InvestigationGroup\InvestigationGroupController');
Route::get('/researchersGroup','InvestigationGroup\InvestigationGroupController@getResearchers');
Route::get('/notResearchersGroup','InvestigationGroup\InvestigationGroupController@getNotResearchers');
Route::get('/projectsGroup','InvestigationGroup\InvestigationGroupController@getProjects');
Route::get('investigationGroup/{slug}', 'Web\PageController@showInvestigationGroup')->name('investigationGroup');

//Research
Route::resource('researchers', "Researcher\ResearcherController");

//Unit
Route::resource('units',"Unit\UnitController");

//Researcher_user
Route::resource('researchers_users', 'Researcher_user\Researcher_userController');

//Researcher_Group
Route::resource('researchers_groups','Researcher_Group\Researcher_GroupController');

//Product_Group
Route::resource('products_groups','Product_Group\Product_GroupController');

//Proyect_Group
Route::resource('projects_groups','Project_Group\Project_GroupController');
