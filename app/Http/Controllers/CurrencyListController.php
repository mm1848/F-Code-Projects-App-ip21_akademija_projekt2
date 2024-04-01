<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class CurrencyListController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function index(Request $request)
    {
        $currenciesData = $this->apiService->getAllCurrencies();

        if (!$currenciesData || !isset($currenciesData['data'])) {
            abort(404, 'Unable to retrieve currencies.');
        }

        // Convert each array element to an object
        $currencies = array_filter($currenciesData['data'], function ($currency) {
            return isset($currency['id']);
        });
        
        $currencies = array_map(function ($currency) {
            return (object) $currency;
        }, $currencies);

        return view('list', ['currencies' => $currencies]);
    }
}
