<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index');
Route::get('home',[
	'as' => 'home',
	'uses' => 'UserController@home',
	]);

Route::get('adminhomepage',[
	'as' => 'adminhomepage',
	'uses' => 'UserController@adminhomepage',
	]);

Route::get('users',[
	'as' => 'users',
	'uses' => 'UserController@users',
	]);

Route::get('user_create', [
	'as' => 'user_create',
	'uses' => 'UserController@user_create',
	]);

Route::post('user_create_process', [
	'as' => 'user_create_process',
	'uses' => 'UserController@user_create_process',
	]);

Route::get('user_index',[
	'as' => 'user_index',
	'uses' => 'UserController@user_index',
	]);

Route::get('user_show',[
	'as' => 'user_show',
	'uses' => 'UserController@user_show',
	]);

Route::get('user_edit',[
	'as' => 'user_edit',
	'uses' => 'UserController@user_edit',
	]);

Route::post('user_edit_process',[
	'as' => 'user_edit_process',
	'uses' => 'UserController@user_edit_process',
	]);

Route::get('user_delete',[
	'as' => 'user_delete',
	'uses' => 'UserController@user_delete',
	]);



Route::get('generate_cookie',[
	'as' => 'generate_cookie',
	'uses' => 'LoginController@generate_cookie',
	]);

Route::post('retrieve_cookie',[
	'as' => 'retrieve_cookie',
	'uses' => 'LoginController@retrieve_cookie',
	]);

Route::get('modification_index',[
	'as' => 'modification_index',
	'uses' => 'ModificationController@modification_index',
	]);

Route::get('modification_create', [
	'as' => 'modification_create',
	'uses' => 'ModificationController@modification_create',
	]);

Route::post('modification_create_process', [
	'as' => 'modification_create_process',
	'uses' => 'ModificationController@modification_create_process',
	]);

Route::get('modification_show',[
	'as' => 'modification_show',
	'uses' => 'ModificationController@modification_show',
	]);

Route::get('modification_edit',[
	'as' => 'modification_edit',
	'uses' => 'ModificationController@modification_edit',
	]);

Route::post('modification_edit_process',[
	'as' => 'modification_edit_process',
	'uses' => 'ModificationController@modification_edit_process',
	]);

Route::get('modification_delete',[
	'as' => 'modification_delete',
	'uses' => 'ModificationController@modification_delete',
	]);

Route::get('palmtree_detail',[
	'as' => 'palmtree_detail',
	'uses' => 'PalmTreeController@palmtree_detail',
	]);

Route::get('palmtree_index',[
	'as' => 'palmtree_index',
	'uses' => 'PalmTreeController@palmtree_index',
	]);

Route::get('palmtree_show',[
	'as' => 'palmtree_show',
	'uses' => 'PalmTreeController@palmtree_show',
	]);

Route::get('palmtree_create', [
	'as' => 'palmtree_create',
	'uses' => 'PalmTreeController@palmtree_create',
	]);

Route::get('palmtree_edit',[
	'as' => 'palmtree_edit',
	'uses' => 'PalmTreeController@palmtree_edit',
	]);

Route::get('user_palmtreelist',[
	'as' => 'user_palmtreelist',
	'uses' => 'PalmTreeDisplayController@user_palmtreelist',
	]);

Route::post('palmtree_create_process', [
	'as' => 'palmtree_create_process',
	'uses' => 'PalmTreeController@palmtree_create_process',
	]);

Route::post('palmtree_edit_process',[
	'as' => 'palmtree_edit_process',
	'uses' => 'PalmTreeController@palmtree_edit_process',
	]);

Route::get('palmtree_delete',[
	'as' => 'palmtree_delete',
	'uses' => 'PalmTreeController@palmtree_delete',
	]);

Route::get('palmtree_list', [
	'as' => 'palmtree_list',
	'uses' => 'PalmTreeDisplayController@palmtree_list',
	]);

Route::get('palmtree_display/{id}', [
	'as' => 'palmtree_display',
	'uses' => 'PalmTreeDisplayController@palmtree_display',
	]);

Route::get('mod_index',[
	'as' => 'mod_index',
	'uses' => 'ModificationController@mod_index',
	]);

Route::get('user_modindex',[
	'as' => 'user_modindex',
	'uses' => 'ModificationController@user_modindex',
	]);

Route::get('mod_select_mutation/{id}',[
	'as' => 'mod_select_mutation',
	'uses' => 'ModificationController@mod_select_mutation',
	]);

Route::get('mod_insertion/{id}',[
	'as' => 'mod_insertion',
	'uses' => 'ModificationController@mod_insertion',
	]);

Route::get('mod_insertion_edit/{id}',[
	'as' => 'mod_insertion_edit',
	'uses' => 'ModificationController@mod_insertion_edit',
	]);

Route::post('mod_insertion_edit_process/{id}',[
	'as' => 'mod_insertion_edit_process',
	'uses' => 'ModificationController@mod_insertion_edit_process',
	]);

Route::post('mod_insertion_show/{id}',[
	'as' => 'mod_insertion_show',
	'uses' => 'ModificationController@mod_insertion_show',
	]);

Route::post('mod_insertion_save/{id}/{mod_gene_array}',[
	'as' => 'mod_insertion_save',
	'uses' => 'ModificationController@mod_insertion_save',
	]);

Route::get('mod_deletion/{id}',[
	'as' => 'mod_deletion',
	'uses' => 'ModificationController@mod_deletion',
	]);

Route::post('mod_deletion_show/{id}',[
	'as' => 'mod_deletion_show',
	'uses' => 'ModificationController@mod_deletion_show',
	]);

Route::post('mod_deletion_save/{id}/{mod_gene_array}',[
	'as' => 'mod_deletion_save',
	'uses' => 'ModificationController@mod_deletion_save',
	]);

Route::get('mod_substitution/{id}',[
	'as' => 'mod_substitution',
	'uses' => 'ModificationController@mod_substitution',
	]);

Route::get('mod_substitution_edit/{id}',[
	'as' => 'mod_substitution_edit',
	'uses' => 'ModificationController@mod_substitution_edit',
	]);

Route::post('mod_substitution_edit_process/{id}',[
	'as' => 'mod_substitution_edit_process',
	'uses' => 'ModificationController@mod_substitution_edit_process',
	]);

Route::post('mod_substitution_show/{id}',[
	'as' => 'mod_substitution_show',
	'uses' => 'ModificationController@mod_substitution_show',
	]);

Route::post('mod_substitution_save/{id}/{mod_gene_array}',[
	'as' => 'mod_substitution_save',
	'uses' => 'ModificationController@mod_substitution_save',
	]);

Route::get('mod_duplication/{id}',[
	'as' => 'mod_duplication',
	'uses' => 'ModificationController@mod_duplication',
	]);

Route::post('mod_duplication_show/{id}',[
	'as' => 'mod_duplication_show',
	'uses' => 'ModificationController@mod_duplication_show',
	]);

Route::post('mod_duplication_save/{id}/{mod_gene_array}',[
	'as' => 'mod_duplication_save',
	'uses' => 'ModificationController@mod_duplication_save',
	]);

Route::get('ana_index',[
	'as' => 'ana_index',
	'uses' => 'AnalyzationController@ana_index',
	]);

Route::get('analyzation_index',[
	'as' => 'analyzation_index',
	'uses' => 'AnalyzationController@analyzation_index',
	]);

Route::get('analyzation_create', [
	'as' => 'analyzation_create',
	'uses' => 'AnalyzationController@analyzation_create',
	]);

Route::post('analyzation_create_process', [
	'as' => 'analyzation_create_process',
	'uses' => 'AnalyzationController@analyzation_create_process',
	]);

Route::get('analyzation_show',[
	'as' => 'analyzation_show',
	'uses' => 'AnalyzationController@analyzation_show',
	]);

Route::get('analyzation_edit',[
	'as' => 'analyzation_edit',
	'uses' => 'AnalyzationController@analyzation_edit',
	]);

Route::post('analyzation_edit_process',[
	'as' => 'analyzation_edit_process',
	'uses' => 'AnalyzationController@analyzation_edit_process',
	]);

Route::get('analyzation_delete',[
	'as' => 'analyzation_delete',
	'uses' => 'AnalyzationController@analyzation_delete',
	]);

Route::get('ana_index_process',[
	'as' => 'ana_index_process',
	'uses' => 'AnalyzationController@ana_index_process',
	]);

Route::get('ana_select_analyze/{id}',[
	'as' => 'ana_select_analyze',
	'uses' => 'AnalyzationController@ana_select_analyze',
	]);

Route::get('ana_rgr/{id}',[
	'as' => 'ana_rgr',
	'uses' => 'AnalyzationController@ana_rgr',
	]);

Route::post('ana_rgr_show/{id}',[
	'as' => 'ana_rgr_show',
	'uses' => 'AnalyzationController@ana_rgr_show',
	]);

Route::post('ana_rgr_save/{id}/{rgr}',[
	'as' => 'ana_rgr_save',
	'uses' => 'AnalyzationController@ana_rgr_save',
	]);

Route::get('ana_wp/{id}',[
	'as' => 'ana_wp',
	'uses' => 'AnalyzationController@ana_wp',
	]);

Route::post('ana_wp_show/{id}',[
	'as' => 'ana_wp_show',
	'uses' => 'AnalyzationController@ana_wp_show',
	]);

Route::post('ana_wp_save/{id}/{wp}',[
	'as' => 'ana_wp_save',
	'uses' => 'AnalyzationController@ana_wp_save',
	]);

Route::get('ana_sn/{id}',[
	'as' => 'ana_sn',
	'uses' => 'AnalyzationController@ana_sn',
	]);

Route::post('ana_sn_show/{id}',[
	'as' => 'ana_sn_show',
	'uses' => 'AnalyzationController@ana_sn_show',
	]);

Route::post('ana_sn_save/{id}/{sn}/{d1}/{d2}/{r1}/{r2}',[
	'as' => 'ana_sn_save',
	'uses' => 'AnalyzationController@ana_sn_save',
	]);

Route::get('modification_checklist',[
	'as' => 'modification_checklist',
	'uses' => 'AnalyzationController@modification_checklist',
	]);

Route::get('cetak_ListOfUser', [
	'as' => 'cetak_ListOfUser',
	'uses' => 'UserController@cetak_ListOfUser',
	]);

Route::get('cetak_ListOfPalmTree', [
	'as' => 'cetak_ListOfPalmTree',
	'uses' => 'PalmTreeController@cetak_ListOfPalmTree',
	]);

Route::get('cetak_ListOfModification', [
	'as' => 'cetak_ListOfModification',
	'uses' => 'ModificationController@cetak_ListOfModification',
	]);

Route::get('cetak_ListOfAnalyzation', [
	'as' => 'cetak_ListOfAnalyzation',
	'uses' => 'AnalyzationController@cetak_ListOfAnalyzation',
	]);

Route::get('palmtree_print/{id}',[
	'as' => 'palmtree_print',
	'uses' => 'PalmTreeController@palmtree_print',
	]);

Route::get('modification_print/{id}', [
	'as' => 'modification_print',
	'uses' => 'ModificationController@modification_print',
	]);

Route::get('analyzation_print/{id}', [
	'as' => 'analyzation_print',
	'uses' => 'AnalyzationController@analyzation_print',
	]);