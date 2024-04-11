<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favourite;
use App\Services\ApiService;

class ShowPriceController extends Controller
{
    public function showPrice(Request $request, ApiService $apiService)
    {
        $baseCurrency = $request->get('base_currency');
        $quoteCurrency = $request->get('quote_currency');

        $priceInfo = $apiService->getCurrencyPairPrice($baseCurrency, $quoteCurrency);

        if ($priceInfo) {
            $price = $priceInfo['data']['amount'];
        } else {
            return response()->json(['error' => 'Unable to retrieve price'], 404);
        }

        return response()->json(['price' => $price]);
    }
}

