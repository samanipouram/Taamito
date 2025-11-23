<?php

namespace App\Services;


use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class ProductService
{
    public function getProducts()
    {
        return Cache::remember('products', 3600, function () {
            try {
                $response = Http::timeout('30')->get('https://jssor.taamito.com/api/v1/products');
                $response->throw();
                $result = $response->json();
                $processData = $this->processData($result);
                if ($processData['status']) {
                    return [
                        'success' => true,
                        'data' => $processData['data'],
                    ];
                }else {
                    return [
                        'success' => false,
                        'message' => $processData['message'] ?? 'Error',
                        'data' => [],
                    ];
                }
            } catch (\Exception $e) {
                \Log::error('API request failed: ' . $e->getMessage());
                return [];
            }
        });
    }

    public function processData($response)
    {
        if ($response['is_success'] && $response['status'] == 'success')
            return ['status' => true , 'message' => 'ok' , 'data' => $response['entity']['data']];
        else
            return ['status' => false , 'message' => $response['message']];
    }
}
