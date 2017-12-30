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


Route::group(["prefix" => "admin", "middleware" => "auth"], function () {


    // posts route
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


    // category route
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


// tag route
    Route::get('/tags', [
            "uses" => "TagsController@index",
            "as" => "tags"
        ]
    );

    Route::get('/tag/create', [
            "uses" => "TagsController@create",
            "as" => "tag.create"
        ]
    );

    Route::post('/tag/store', [
            "uses" => "TagsController@store",
            "as" => "tag.store"
        ]
    );

    Route::get('/tag/edit/{id}', [
            "uses" => "TagsController@edit",
            "as" => "tag.edit"
        ]
    );
    Route::get('/tag/delete/{id}', [
            "uses" => "TagsController@destroy",
            "as" => "tag.delete"
        ]
    );


    Route::post('/tag/update/{id}', [
            "uses" => "TagsController@update",
            "as" => "tag.update"
        ]
    );


    // user route
    Route::get('/users', [
            "uses" => "UsersController@index",
            "as" => "users"
        ]
    )->middleware('admin');

    Route::get('/user/delete/{id}', [
            "uses" => "UsersController@destroy",
            "as" => "user.delete"
        ]
    )->middleware('admin');

    Route::get('/user/create', [
            "uses" => "UsersController@create",
            "as" => "user.create"
        ]
    )->middleware('admin');

    Route::post('/user/store', [
            "uses" => "UsersController@store",
            "as" => "user.store"
        ]
    )->middleware('admin');

    Route::get('/user/admin/{id}', [
            "uses" => "UsersController@admin",
            "as" => "user.admin"
        ]
    )->middleware('admin');


    Route::get('/user/not-admin/{id}', [
            "uses" => "UsersController@not_admin",
            "as" => "user.not_admin"
        ]
    )->middleware('admin');

    Route::get('/user/profile', [
            "uses" => "ProfilesController@index",
            "as" => "user.profile"
        ]
    );

    Route::post('/user/profile/{id}', [
            "uses" => "ProfilesController@update",
            "as" => "user.profile.update"
        ]
    );


    //setting
    Route::get('/settings', [
            "uses" => "SettingsController@index",
            "as" => "settings"
        ]
    );

    Route::post('/setting/post/{id}', [
            "uses" => "SettingsController@update",
            "as" => "setting.update"
        ]
    );


    Route::get('/test', function () {
        return App\Profile::find(1)->user;
    });


    Route::get('/', [
        "uses" => "HomeController@index",
        "as" => "home"
    ]);

    Route::get('/home', [
        "uses" => "HomeController@index",
        "as" => "admin.home"
    ]);


});


Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => 'index',

]);


Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single',

]);

Route::get('/post/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as' => 'category.single',

]);


Route::get('/post/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as' => 'tag.single',

]);


Route::get('/results', function () {
    $posts = \App\Post::where('title', 'like', '%' . request('query') . '%')->get();



    return view('result')
        ->with('posts', $posts)
        ->with('settings', \App\Setting::first())
        ->with('title', 'Search Result: ' . request('query'))
        ->with('categories', \App\Category::all())
        ->with('query', request('query'));

});


Auth::routes();