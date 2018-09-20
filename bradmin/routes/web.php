<?php

Route::get('/bradmin', [
    'as'   => 'bradmin.index',
    'uses' => 'Bradmin\Controllers\BrAdminController@getIndex',
]);

Route::get('/bradmin/sidebar-menu', [
    'as'   => 'bradmin.sidebarMenu',
    'uses' => 'Bradmin\Controllers\BrAdminController@getSidebarMenu',
]);

Route::get('/bradmin/{section}', [
    'as'   => 'bradmin.section.display',
    'uses' => 'BrAdminController@getDisplay',
]);

Route::get('/bradmin/{section}/create', [
    'as'   => 'bradmin.section.create',
    'uses' => 'BrAdminController@getCreate',
]);

Route::get('/bradmin/{section}/{id}', [
    'as'   => 'bradmin.section.edit',
    'uses' => 'BrAdminController@getEdit',
]);

Route::post('/bradmin/{section}/{id}', [
    'as'   => 'bradmin.section.edit',
    'uses' => 'BrAdminController@postEdit',
]);

Route::delete('/bradmin/{section}/{id}', [
    'as'   => 'bradmin.section.delete',
    'uses' => 'BrAdminController@deleteDelete',
]);