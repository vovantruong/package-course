<?php

use Illuminate\Session\TokenMismatchException;

/**
 * FRONT
 */
Route::get('course', [
    'as' => 'course',
    'uses' => 'Vovantruong\Course\Controllers\Front\CourseFrontController@index'
]);


/**
 * ADMINISTRATOR
 */
Route::group(['middleware' => ['web']], function () {

    Route::group(['middleware' => ['admin_logged', 'can_see', 'in_context'],
                  'namespace' => 'Vovantruong\Course\Controllers\Admin',
        ], function () {

        /*
          |-----------------------------------------------------------------------
          | Manage course
          |-----------------------------------------------------------------------
          | 1. List of courses
          | 2. Edit course
          | 3. Delete course
          | 4. Add new course
          | 5. Manage configurations
          | 6. Manage languages
          |
        */

        /**
         * list
         */
        Route::get('admin/courses', [
            'as' => 'courses.list',
            'uses' => 'courseAdminController@index'
        ]);

        /**
         * edit-add
         */
        Route::get('admin/courses/edit', [
            'as' => 'courses.edit',
            'uses' => 'courseAdminController@edit'
        ]);

        /**
         * copy
         */
        Route::get('admin/courses/copy', [
            'as' => 'courses.copy',
            'uses' => 'courseAdminController@copy'
        ]);

        /**
         * course
         */
        Route::post('admin/courses/edit', [
            'as' => 'courses.course',
            'uses' => 'CourseAdminController@course'
        ]);

        /**
         * delete
         */
        Route::get('admin/courses/delete', [
            'as' => 'courses.delete',
            'uses' => 'CourseAdminController@delete'
        ]);

        /**
         * trash
         */
         Route::get('admin/courses/trash', [
            'as' => 'courses.trash',
            'uses' => 'CourseAdminController@trash'
        ]);

        /**
         * configs
        */
        Route::get('admin/courses/config', [
            'as' => 'courses.config',
            'uses' => 'CourseAdminController@config'
        ]);

        Route::post('admin/courses/config', [
            'as' => 'courses.config',
            'uses' => 'CourseAdminController@config'
        ]);

        /**
         * language
        */
        Route::get('admin/courses/lang', [
            'as' => 'courses.lang',
            'uses' => 'CourseAdminController@lang'
        ]);

        Route::post('admin/courses/lang', [
            'as' => 'courses.lang',
            'uses' => 'CourseAdminController@lang'
        ]);

    });
});
