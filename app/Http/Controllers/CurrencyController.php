<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Services\ApiService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function showCurrenciesPage()
    {
        $currenciesData = $this->apiService->getAllCurrencies();
        if (!$currenciesData) {
            abort(404, 'Unable to retrieve currencies.');
        }
    
        $currencies = collect($currenciesData['data'] ?? [])
            ->map(function ($currency) {
                return new Currency($currency['id'] ?? $currency['code'], $currency['name']);
            })
            ->toArray();
    
            usort($currencies, function ($a, $b) {
                return strcmp($a->name, $b->name);
        });
    
        return view('select_currencies', ['currencies' => $currencies]);
    }
}