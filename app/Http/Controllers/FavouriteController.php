<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    public function addOrUpdateFavourite(Request $request)
    {
        $user = Auth::user();
        $currencyName = $request->input('currency_name');
        $favourite = $user->favourites()->firstOrCreate([
            'currency_name' => $currencyName,
        ]);

        if ($favourite->wasRecentlyCreated) {
            return redirect()->back()->with('status', 'Favourite added successfully.');
        } else {
            return redirect()->back()->with('status', 'Favourite already exists.');
        }
    }

    public function showFavourites()
    {
        $userId = Auth::id();
        $favourites = Favourite::where('user_id', $userId)->get();
    
        return view('favourites.index', ['favourites' => $favourites]);
    }
    
    public function deleteFavourite(Request $request, $currencyName)
    {
        $userId = Auth::id();
        Favourite::where('user_id', $userId)->where('currency_name', $currencyName)->delete();
    
        return redirect()->back()->with('status', 'Favourite deleted successfully.');
    }
}
