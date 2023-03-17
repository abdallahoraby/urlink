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


Route::group(['middleware' => 'auth', 'namespace' => 'Users'],function(){
    Route::get('logout', 'UsersController@GET_logout')->name('get_logout');
});

Auth::routes();


//Route::get('/about-us', 'MainController@Get_about_us');

Route::group(['namespace' => 'Admins', 'middleware' => ['admin', 'relogin'], 'prefix' => 'admin'],function(){

    Route::group(['prefix' => 'profile'],function(){


        Route::get('/', 'AdminsController@GET_profile')->name('admin_get_profile');


        Route::get('pages', 'AdminsController@GET_pages')->name('get_pages');

        Route::get('get', 'AdminsController@getUsers')->name('test');

    });

    Route::group(['prefix' => 'setting'], function(){
        Route::get('get', 'AdminsController@GET_Setting')->name('setting');
        Route::get('edit/{settingId}', 'AdminsController@GET_EDIT_Setting');
        Route::put('edit', 'AdminsController@POST_EDIT_Setting');
        Route::get('edit-pages', 'AdminsController@editPages');
        Route::get('edit-pages/{pageId}', 'AdminsController@editSinglePage');
        Route::put('update-page', 'AdminsController@updateSinglePage');
    });

    Route::group(['prefix' => 'users'],function(){
        Route::get('get', 'AdminsController@getUsers');
        Route::group(['prefix' => 'operations'], function(){
            Route::get('activity/{userId}/{active}', 'AdminsController@updateActivity');
            Route::get('rule/{userId}/{rule}', 'AdminsController@updateRule');
        });
        Route::post('create', 'AdminsController@createNewUser')->name('createNewUser');

        /* Route::put('update/{userId}, AdminsController@updateUser'); */
    });

    Route::group(['prefix' => 'styles'],function(){
        //Route::get('create', 'AdminsController@getCreateStyle')->name('get_create_style');
        Route::post('create', 'AdminsController@postCreateStyle')->name('createNewStyle');

        Route::get('get', 'AdminsController@getStyles')->name('get_styles');

        /* Route::put('update/{styleId}, AdminsController@updateStyle'); */
    });
});

Route::group(['namespace' => 'Users'],function(){


    Route::get('about-us', 'MainController@GET_about_us');
    Route::get('/contact-us', 'MainController@GET_contact_us');
    Route::post('/contact-us', 'MainController@POST_contact_us')->name('post_contact_us');
    Route::get('/privacy', 'MainController@GET_privacy');
    Route::get('/terms', 'MainController@GET_terms');
    Route::get('/plans', 'MainController@getPlans')->name('plans-page');


    /*** Test View comment in production ***/
    Route::get('/test', 'MainController@getTest');



    Route::get('register', 'UsersController@GET_register')->name('get_register');
    Route::post('register', 'UsersController@POST_register')->name('post_register');
    Route::get('login', 'UsersController@GET_login')->name('get_login');
    Route::post('login', 'UsersController@POST_login')->name('post_login');

    Route::group(['prefix' => 'password'],function(){
        Route::get('forget', 'UsersController@GET_forget_password')->name('get_forget_pass');
        Route::post('forget', 'UsersController@POST_forget_password')->name('post_post_login');
        Route::get('reset/{token}', 'UsersController@GET_reset_password')->name('reset_pass');
        Route::put('change', 'UsersController@GET_change_password')->name('change_pass');
    });

    Route::group(['prefix' => 'user', 'middleware' => ['auth', 'relogin']],function(){
        Route::group(['prefix' => 'profile'], function(){
            Route::get('get', 'UsersController@GET_profile')->name('get_profile');
            Route::get('password', 'UsersController@GET_password')->name('get_password');
            Route::put('password/update', 'UsersController@UPDATE_password')->name('update_password');
            Route::get('pages', 'UsersController@GET_pages')->name('get_pages');
            Route::put('update', 'UsersController@UPDATE_profile')->name('update_profile');

            Route::get('statistics/{page_id}', 'UsersController@GET_statistics')->name('GET_statistics');


            Route::group(['prefix' => 'style'], function(){
                Route::get('get/{page_id}', 'UsersController@UPDATE_get_style')->name('UPDATE_get_style');
                Route::get('update/{page_id}/{style_id}', 'UsersController@UPDATE_put_style')->name('UPDATE_put_style');
            });
        });

        Route::group(['prefix' => 'landing-page'], function(){
            Route::get('get/{id?}', 'UsersController@GET_landing_page');
            Route::get('create', 'UsersController@GET_CREATE_landing_page')->name('get_create_landing_page');
            Route::post('create', 'UsersController@POST_CREATE_landing_page')->name('post_create_landing_page');
            Route::get('update/{page_id}', 'UsersController@UPDATE_get_landing_page')->name('UPDATE_get_landing_page');
            Route::put('update/{page_id}', 'UsersController@UPDATE_put_landing_page')->name('UPDATE_put_landing_page');
            //Route::get('statistic/{page_id}', 'UsersController@GET_landing_page_statistics')->name('GET_statistics');
            Route::get('delete/{page_id}', 'UsersController@DELETE_landing_page')->name('delete_landing_page');
        });

        Route::group(['prefix' => 'subscribe'], function (){
            Route::get('remove/{subscription_id}', 'PlanSubscriptionController@removeSubscription')->name('remove_subscription');
            Route::get('add/{plan_id}', 'PlanSubscriptionController@addSubscription')->name('add_subscription');
        });
    });
    Route::get('/{page_name?}', 'UsersController@GET_page');

});


/*
Route::get('/home', 'HomeController@index')->name('home'); */




