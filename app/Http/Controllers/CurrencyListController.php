<?php

namespace App\Http\Controllers;

use App\Models\Currency;
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
        $currencyData = $this->apiService->getAllCurrencies();
        if (!$currencyData) {
            abort(404, 'Unable to retrieve currencies.');
        }

        $currencies = array_map(function ($data) {
            return new Currency($data['id'], $data['name']);
        }, $currencyData['data']);

        usort($currencies, function ($a, $b) {
            return strcmp($a->name, $b->name);
        });

        return view('list', ['currencies' => $currencies]);
    }
}