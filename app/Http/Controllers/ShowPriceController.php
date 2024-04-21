<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;

class ShowPriceController extends Controller
{
    public function showPrice(Request $request, ApiService $apiService)
    {
        $baseCurrency = $request->get('base_currency');
        $quoteCurrency = $request->get('quote_currency');
    
        $priceInfo = $apiService->getCurrencyPairPrice($baseCurrency, $quoteCurrency);
    
        if ($priceInfo && isset($priceInfo['amount'])) {
            $price = floatval($priceInfo['amount']);  // Pretvori niz v float
            return response()->json($price);  // Vrni kot številko
        } else {
            return response()->json(['error' => 'Unable to retrieve price'], 404);
        }
    }
}