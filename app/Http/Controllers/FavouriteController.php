<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controller for managing user's favourite currencies.
 */
class FavouriteController extends Controller
{
    /**
     * Adds or updates a user's favourite currency.
     * If the currency already exists for the user, it does nothing.
     * Otherwise, it creates a new favourite entry.
     *
     * @param  \Illuminate\Http\Request  $request  The request object, containing the 'currency_name'.
     * @return \Illuminate\Http\RedirectResponse   Redirects back with a status message.
     */
    public function addOrUpdateFavourite(Request $request)
    {
        $user = Auth::user(); // Getting the currently authenticated user
        $currencyName = $request->input('currency_name');

        // Using firstOrCreate to avoid duplicate entries
        $favourite = $user->favourites()->firstOrCreate([
            'currency_name' => $currencyName,
        ]);

        if ($favourite->wasRecentlyCreated) {
            return redirect()->back()->with('status', 'Favourite added successfully.');
        } else {
            return redirect()->back()->with('status', 'Favourite already exists.');
        }
    }

    /**
     * Displays the list of user's favourite currencies.
     *
     * @return \Illuminate\View\View Returns a view with the user's favourite currencies.
     */
    public function showFavourites()
    {
        $userId = Auth::id();
        $favourites = Favourite::where('user_id', $userId)->get();
    
        return view('favourites.index', ['favourites' => $favourites]);
    }

    /**
     * Deletes a user's favourite currency.
     *
     * @param  \Illuminate\Http\Request  $request      The request object.
     * @param  string                    $currencyName The name of the currency to delete.
     * @return \Illuminate\Http\RedirectResponse       Redirects back with a status message.
     */
    public function deleteFavourite(Request $request, $currencyName)
    {
        $userId = Auth::id();
        Favourite::where('user_id', $userId)->where('currency_name', $currencyName)->delete();
    
        return redirect()->back()->with('status', 'Favourite deleted successfully.');
    }
}
