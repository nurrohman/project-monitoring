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

// Authentication
Route::get('auth/login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\AuthController@getLogout']);


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);

    Route::group(['prefix' => 'masterdata'], function () {

    	Route::group(['prefix' => 'role'], function(){
    		Route::get('/', ['as' => 'masterdata.role.index', 'uses' => 'RoleController@index']);
    		Route::get('/create', ['as' => 'masterdata.role.create', 'uses' => 'RoleController@create']);
            Route::get('/edit/{id}', ['as' => 'masterdata.role.edit', 'uses' => 'RoleController@edit']);
            Route::post('/store', ['as' => 'masterdata.role.store', 'uses' => 'RoleController@store']);
    		Route::post('/update/{id}', ['as' => 'masterdata.role.update', 'uses' => 'RoleController@update']);
            Route::get('/destroy/{id}', ['as' => 'masterdata.role.destroy', 'uses' => 'RoleController@destroy']);
    	});

    	Route::group(['prefix' => 'client'], function(){
    		Route::get('/', ['as' => 'masterdata.client.index', 'uses' => 'ClientController@index']);
    		Route::get('/create', ['as' => 'masterdata.client.create', 'uses' => 'ClientController@create']);
    		Route::get('/edit/{id}', ['as' => 'masterdata.client.edit', 'uses' => 'ClientController@edit']);
    		Route::post('/store', ['as' => 'masterdata.client.store', 'uses' => 'ClientController@store']);
    		Route::post('/update/{id}', ['as' => 'masterdata.client.update', 'uses' => 'ClientController@update']);
    		Route::get('/destroy/{id}', ['as' => 'masterdata.client.destroy', 'uses' => 'ClientController@destroy']);
    	});

        Route::group(['prefix' => 'employee'], function(){
            Route::get('/', ['as' => 'masterdata.employee.index', 'uses' => 'EmployeeController@index']);
            Route::get('/create', ['as' => 'masterdata.employee.create', 'uses' => 'EmployeeController@create']);
            Route::get('/edit/{id}', ['as' => 'masterdata.employee.edit', 'uses' => 'EmployeeController@edit']);
            Route::post('/store', ['as' => 'masterdata.employee.store', 'uses' => 'EmployeeController@store']);
            Route::post('/update/{id}', ['as' => 'masterdata.employee.update', 'uses' => 'EmployeeController@update']);
            Route::get('/destroy/{id}', ['as' => 'masterdata.employee.destroy', 'uses' => 'EmployeeController@destroy']);
        });

    });

	Route::group(['prefix' => 'project'], function(){
    	Route::get('/', ['as' => 'project.index', 'uses' => 'ProjectController@index']);
    	Route::get('create', ['as' => 'project.create', 'uses' => 'ProjectController@create']);
    	Route::post('store', ['as' => 'project.store', 'uses' => 'ProjectController@store']);
    	Route::get('edit/{id}', ['as' => 'project.edit', 'uses' => 'ProjectController@edit']);
    	Route::post('update/{id}', ['as' => 'project.update', 'uses' => 'ProjectController@update']);
    	Route::get('destroy/{id}', ['as' => 'project.destroy', 'uses' => 'ProjectController@destroy']);
        Route::get('show/{slug}', ['as' => 'project.show', 'uses' => 'ProjectController@show']);


        Route::group(['prefix' => 'milestone'], function(){
            Route::get('/', ['as' => 'project.milestone.index', 'uses' => 'MilestonesController@index']);
            Route::get('create', ['as' => 'project.milestone.create', 'uses' => 'MilestonesController@create']);
            Route::post('store/{project_id}', ['as' => 'project.milestone.store', 'uses' => 'MilestonesController@store']);
            Route::get('edit/{id}', ['as' => 'project.milestone.edit', 'uses' => 'MilestonesController@edit']);
            Route::post('update/{id}', ['as' => 'project.milestone.update', 'uses' => 'MilestonesController@update']);
            Route::get('destroy/{id}', ['as' => 'project.milestone.destroy', 'uses' => 'MilestonesController@destroy']);
        });

        Route::group(['prefix' => 'feature'], function(){
            Route::get('{milestone_id}', ['as' => 'project.feature.index', 'uses' => 'FeatureController@getIndex']);
            Route::get('/create/{milestone_id}', ['as' => 'project.feature.create', 'uses' => 'FeatureController@create']);
            Route::post('/store/{milestone_id}', ['as' => 'project.feature.store', 'uses' => 'FeatureController@store']);
            Route::get('/edit/{id}', ['as' => 'project.feature.edit', 'uses' => 'FeatureController@edit']);
            Route::post('/update/{id}', ['as' => 'project.feature.update', 'uses' => 'FeatureController@update']);
            Route::get('/destroy/{id}', ['as' => 'project.feature.destroy', 'uses' => 'FeatureController@destroy']);
        });

        Route::group(['prefix' => 'task'], function(){
            Route::get('/{feature_id}', ['as' => 'project.task.index', 'uses' => 'TaskController@index']);
            Route::get('/create/{feature_id}', ['as' => 'project.task.create', 'uses' => 'TaskController@create']);
            Route::post('/store/{feature_id}', ['as' => 'project.task.store', 'uses' => 'TaskController@store']);
            Route::get('/edit/{id}', ['as' => 'project.task.edit', 'uses' => 'TaskController@edit']);
            Route::post('/update/{id}', ['as' => 'project.task.update', 'uses' => 'TaskController@update']);
            Route::get('/destroy/{id}', ['as' => 'project.task.destroy', 'uses' => 'TaskController@destroy']);
        });

        Route::group(['prefix' => 'assign'], function(){
            Route::post('store/{project_id}', ['as' => 'project.assign.store', 'uses' => 'ProjectAssignController@postStore']);
        });

    });

    Route::group(['prefix' => 'user'], function(){
                Route::get('/', ['as' => 'user.index', 'uses' => 'UserController@index']);
                Route::get('pull', ['as' => 'user.pull', 'uses' => 'UserController@pull']);
//                Route::post('store', ['as' => 'user.store', 'uses' => 'UserController@store']);
//                Route::get('edit/{id}', ['as' => 'user.edit', 'uses' => 'UserController@edit']);
//                Route::post('update/{id}', ['as' => 'user.update', 'uses' => 'UserController@update']);
//                Route::get('destroy/{id}', ['as' => 'user.destroy', 'uses' => 'UserController@destroy']);

            });

});
