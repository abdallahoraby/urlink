<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['namespace' => 'API'], function(){
    Route::group(['namespace' => 'Users'], function(){

        Route::get('/{page_name?}', 'UsersController@GET_page');

        /**
         * @Desc: Register via API
         * @URL: api/register
         * @Permission:
         * @Parameters: email, password, name
         * @method: POST
         */
        Route::post('register', 'UsersController@POST_register');

         /**
         * @Desc: Login via API
         * @URL: api/login
         * @Permission:
         * @Parameters: email, password
         * @method: POST
         */
        Route::post('login', 'UsersController@POST_login');

        Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function(){

            Route::group(['prefix' => 'profile'], function(){

            /**
             * @Desc: Get profile via API
             * @URL: api/user/profile/get
             * @Permission: Auth
             * @Parameters:
             * @method: GET
             */
            Route::get('get', 'UsersController@GET_profile');

            /**
             * @Desc: Get profile via API
             * @URL: api/user/profile/update
             * @Permission: Auth
             * @Parameters:
             * @method: PUT
             */
            Route::put('update', 'UsersController@UPDATE_profile');

            });

            Route::group(['prefix' => 'landing-page'], function(){

                /**
                 * @Desc: Get user landing page by id or Get all pages for current user via API
                 * @URL: api/user/landing-page/get
                 * @Permission: Auth
                 * @Parameters:
                 * @method: GET
                 */
                Route::get('get/{id?}', 'UsersController@GET_landing_page');

                /**
                 * @Desc: Create user landing page via API
                 * @URL: api/user/landing-page/post
                 * @Permission: Auth
                 * @Parameters:
                 * @method: POST
                 */
                Route::post('create', 'UsersController@CREATE_landing_page');

                /**
                 * @Desc: Update landing page via API
                 * @URL: api/user/landing-page/update
                 * @Permission: Auth
                 * @Parameters:
                 * @method: PUT
                 */
                Route::put('update/{id}', 'UsersController@UPDATE_landing_page');

                });


        });

    });

});


/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */
