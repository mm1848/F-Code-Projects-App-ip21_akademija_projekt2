<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\User;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{

    //Dodajanje ali Posodabljanje Priljubljenih Valut
    public function addOrUpdateFavourite(Request $request)
    {
        $userId = $request->user()->id;
        $currencyName = $request->currency_name;
        $favourite = Favourite::where('user_id', $userId)->where('currency_name', $currencyName)->first();
    
        if (!$favourite) {
            Favourite::create([
                'user_id' => $userId,
                'currency_name' => $currencyName,
            ]);
        }
    
        return redirect()->back()->with('status', 'Favourite added or updated successfully.');
    }

    // Prikaz Priljubljenih Valut Uporabnika
    public function showFavourites(Request $request)
    {
        $userId = $request->user()->id;
        $favourites = Favourite::where('user_id', $userId)->get();
    
        return view('favourites.index', ['favourites' => $favourites]);
    }


    // Brisanje Priljubljenih Valut
    public function deleteFavourite(Request $request, $currencyName)
{
    $userId = $request->user()->id;
    Favourite::where('user_id', $userId)->where('currency_name', $currencyName)->delete();
    
    return redirect()->back()->with('status', 'Favourite deleted successfully.');
}



}

