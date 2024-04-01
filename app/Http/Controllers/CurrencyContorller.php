<?php

namespace App\Http\Controllers;

use App\Services\ApiService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function showCurrenciesPage(Request $request)
    {
        $currenciesData = $this->apiService->getAllCurrencies();
        if (!$currenciesData || !isset($currenciesData['data'])) {
            abort(404, 'Unable to retrieve currencies.');
        }
    
        // Pretvorite vsak element matrike v objekt
        $currencies = array_map(function ($currency) {
            return (object) $currency;
        }, $currenciesData['data']);
    
        return view('select_currencies', ['currencies' => $currencies]);
    }
}