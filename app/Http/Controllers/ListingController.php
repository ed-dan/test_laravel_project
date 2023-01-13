<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use MongoDB\Driver\Session;
use Termwind\Components\Li;

class ListingController extends Controller
{
    // show all listing
    public static function index()
    {

        return view('listings.index', [
            'listings' => Listing::latest()
                ->filter(request(['tag', 'search','location']))->paginate(10) // paginate for pagination
        ]);
    }

    // show single listing
    public function show(Listing $listing)
    {
        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    // show create listing
    public function create()
    {
        return view('listings.create');
    }

    // store listing data
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);


        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
        Listing::create($formFields);


        return redirect('/')->with('message', 'Listing Created');
    }
}
