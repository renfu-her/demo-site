<?php

namespace App\Services\Product;

use App\Services\Service;
use App\Traits\RulesTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;
use Exception;

class ProductDetailService extends Service
{
    use RulesTrait;

    private $response;
    private $request;
    private $changeErrorName, $dataId;

    public function __construct($request, $dataId = null)
    {
        $this->dataId = $dataId;
        $this->request = collect($request);
    }

    public function detail()
    {

        $data = $this->request->toArray();
        
        $productDetail = Http::get($this->api_url . 'index.php?route=extension/module/api/gws_product&product_id=' . $data['id'] . '&api_key=' . $this->api_key);
        $this->response = $productDetail->json();

        return $this;
    }



    public function runValidate($method)
    {
        switch ($method) {
                // case 'store':
                //     $rules = [
                //         'userToken' => 'required|string',
                //         'title' => 'required|string',
                //         'content' => 'required|string',
                //         'startDate' => 'required|date',
                //         'endDate' => 'required|date',
                //         'mobile' => 'required|string',
                //         'pay' => 'required|integer',
                //         'status' => 'required|integer'
                //     ];
                //     $data = $this->request->toArray();
                //     break;
                // case 'view':
                //     $rules = [
                //         'userToken' => 'required|string',
                //     ];
                //     $data = $this->request->toArray();
                //     break;
                // case 'getAll':
                //     $rules = [
                //         'userToken' => 'required|string',
                //     ];
                //     $data = $this->request->toArray();
                //     break;
                // case 'setStatus':
                //     $rules = [
                //         'userToken' => 'required|string',
                //         'itemId' => 'required|string',
                //         'status' => 'required|string',
                //         'join_id' => 'required|string',
                //     ];
                //     $data = $this->request->toArray();
                //     break;
        }

        // $this->response = self::validate($data, $rules, $this->changeErrorName);

        return $this;
    }

    public function getResponse(): object
    {
        return $this->response;
    }
    public function setResponse($response): self
    {
        $this->response = $response;
        return $this;
    }
}