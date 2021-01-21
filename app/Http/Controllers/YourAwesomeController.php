<?php

namespace App\Http\Controllers;

use App\Services\YourAwesomeService;
use Illuminate\Http\Request;

class YourAwesomeController extends Controller
{
    /**
     * @var YourAwesomeService
     */
    private $service;

    /**
     * YourAwesomeController constructor.
     * @param YourAwesomeService $service
     */
    public function __construct(YourAwesomeService $service)
    {
        $this->service = $service;
    }

    function postRequest(Request $request)
    {
        $this->service->getAllData($request->get('input'));
    }

    function getRequest(Request $request) {
        $param = $request->route()->parameter('slug');

        $this->service->processData($param);
    }
}
