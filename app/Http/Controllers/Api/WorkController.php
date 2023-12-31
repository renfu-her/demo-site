<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Work\WorkService as Service;

class WorkController extends Controller
{
    // index
    public function index(Request $request)
    {
        return (new Service($request))
            ->runValidate('viewDetail')
            ->viewDetail()
            ->getResponse();
    }

    public function doCase(Request $request)
    {
        return (new Service($request))
            ->runValidate('doCase')
            ->doCase()
            ->getResponse();
    }

    public function caseToConfirm(Request $request)
    {
        return (new Service($request))
            ->runValidate('caseToConfirm')
            ->caseToConfirm()
            ->getResponse();
    }


}
