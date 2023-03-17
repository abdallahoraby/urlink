<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @SWG\Swagger(
 *     schemes={"http","https"},
 *     host="127.0.0.1:8000/api/",
 *     basePath="/",
 *     @SWG\SecurityScheme(
 *          securityDefinition = "Bearer",
 *          type = "apiKey",
 *          name = "Authorization",
 *          in = "header"
 *      ),
 *     @SWG\Info(
 *         version="1.0.0",
 *         title="Urlink APIs",
 *         description="Urlink Apis to facilitate the testing process ...",
 *         termsOfService="",
 *         @SWG\Contact(
 *             email="fahad@fcode.sa"
 *         ),
 *         @SWG\License(
 *             name="Private license belongs to Fcode Company",
 *             url="fahad@fcode.sa"
 *         )
 *     ),
 *     @SWG\ExternalDocumentation(
 *         description="Find out more about Urlink website",
 *         url="http..."
 *     )
 * )
 */




class Controller extends BaseController
{




    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(){
        Auth()->setDefaultDriver('api');
    }
}
