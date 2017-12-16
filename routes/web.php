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

Route::get('/',  [
    "uses" => "HomeController@index",
     "as" => "home"
    ]

    );

Route::group(["prefix" => "admin","middleware" => "auth"],function (){

    Route::get('/posts', [
            "uses" => "PostsController@index",
            "as" => "posts"
        ]
    );
    Route::get('/post/create', [
            "uses" => "PostsController@create",
            "as" => "post.create"
        ]
    );

    Route::get('/post/edit/{id}', [
            "uses" => "PostsController@edit",
            "as" => "post.edit"

    ]);
    Route::post('/post/update/{id}', [
            "uses" => "PostsController@update",
            "as" => "post.update"
        ]
    );
    Route::get('/post/trash/{id}', [
            "uses" => "PostsController@trash",
            "as" => "post.trash"
        ]
    );
    Route::get('/post/restore/{id}', [
            "uses" => "PostsController@restore",
            "as" => "post.restore"
        ]
    );
    Route::get('/posts/trashed}', [
            "uses" => "PostsController@trashed",
            "as" => "posts.trashed"
        ]
    );

    Route::get('/post/delete/{id}}', [
            "uses" => "PostsController@destroy",
            "as" => "post.delete"
        ]
    );
    Route::post('/post/store', [
            "uses" => "PostsController@store",
            "as" => "post.store"
        ]
    );

    Route::get('/category/create', [
            "uses" => "CategoryController@create",
            "as" => "category.create"
        ]
    );

    Route::get('/categories', [
            "uses" => "CategoryController@index",
            "as" => "categories"
        ]
    );

    Route::post('/category/store', [
            "uses" => "CategoryController@store",
            "as" => "category.store"
        ]
    );

    Route::get('/category/edit/{id}', [
            "uses" => "CategoryController@edit",
            "as" => "category.edit"
        ]
    );

    Route::post('/category/update/{id}', [
            "uses" => "CategoryController@update",
            "as" => "category.update"
        ]
    );

    Route::get('/category/delete/{id}', [
            "uses" => "CategoryController@destroy",
            "as" => "category.delete"
        ]
    );
});





Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');
