<?php

Route::post('/'.config('bradmin.admin_url').'/cms/pages', [
    'as'   => 'bradmin.cms.pages.display',
    'uses' => 'Bradmin\Plugins\BrainorCms\Controllers\BrainorCmsController@displayPages',
]);
Route::post('/'.config('bradmin.admin_url').'/cms/posts', [
    'as'   => 'bradmin.cms.pages.display',
    'uses' => 'Bradmin\Plugins\BrainorCms\Controllers\BrainorCmsController@displayPages',
]);
