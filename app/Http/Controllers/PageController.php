<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ApiService;
use App\Models\Favourite; // Uporabite vaš model Favourite
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function homePage(ApiService $apiService) // Predpostavljamo, da imate ApiService
    {
        $userId = Auth::id(); // Pridobi ID trenutno prijavljenega uporabnika
        $favourites = Favourite::where('user_id', $userId)->get();
        $currenciesData = $apiService->getAllCurrencies(); // Pridobi seznam vseh valut
        
        return view('home', [
            'favourites' => $favourites,
            'currencies' => $currenciesData['data'] ?? [], // Posreduj seznam vseh valut
        ]);
    }
}
