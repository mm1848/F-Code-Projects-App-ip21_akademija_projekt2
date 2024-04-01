<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favourite;
use App\Services\ApiService;

class ShowPriceController extends Controller
{

    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function showPrice(Request $request)
    {
        $baseCurrency = $request->get('base_currency');
        $quoteCurrency = $request->get('quote_currency');

        $priceInfo = $this->apiService->getCurrencyPairPrice($baseCurrency, $quoteCurrency);

        if ($priceInfo) {
            $price = $priceInfo['data']['amount'];
        } else {
            return response()->json(['error' => 'Unable to retrieve price'], 404);
        }

        return response()->json(['price' => $price]);
    }
}

