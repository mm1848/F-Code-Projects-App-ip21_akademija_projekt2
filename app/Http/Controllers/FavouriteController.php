<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Services\ApiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    protected $apiService;

    public function __construct(ApiService $apiService)
    {
        $this->apiService = $apiService;
    }

    public function showFavourites()
    {
        $userId = auth()->id();
        $favourites = Favourite::where('user_id', $userId)->get();
        
        return view('favourites', ['favourites' => $favourites]);
    }

    public function addFavourite(Request $request)
    {
        $user = auth()->user();
        $currencyName = $request->input('currency_name');
        $favourite = new Favourite([
            'user_id' => $user->id,
            'currency_name' => $currencyName
        ]);
        $favourite->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Favourite added successfully.',
            'favourites' => $user->favourites
        ]);
    }

    public function deleteFavourite(Request $request, $currencyName)
    {
        $user = auth()->user();
        
        Favourite::where('user_id', $user->id)
                ->where('currency_name', $currencyName)
                ->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Favourite deleted successfully.',
            'favourites' => $user->favourites
        ]);
    }
}