<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    public function __invoke()
    {
        return true;
    }

    //Show all listings
    public function index()
    {
        //Die Dump
        //dd(request('tag'));
        return view('listings.index', [
            // 'listings' => [
            //     [
            //         'id' => 1,
            //         'title' => 'Listing One',
            //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam fermentum sit amet magna id facilisis. Suspendisse tincidunt erat vel dictum pretium. Vestibulum leo lectus, malesuada pretium pharetra tempor, tincidunt non.'
            //     ],
            //     [
            //         'id' => 2,
            //         'title' => 'Listing Two',
            //         'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam lacinia libero sodales diam blandit eleifend. Vivamus at tortor nibh. Sed accumsan quam risus, nec hendrerit sapien semper vel. Curabitur sed.'
            //     ]
            // ]
            // 'listings' => Listing::all()
            'listings' => Listing::latest()->filter(request(['tag', 'search']))->get()
        ]);
    }

    //Show single listing
    public function show(Listing $listing)
    {
        return view('listings.show', [
            'listing' => $listing
        ]);
    }

    //Show create form
    public function create()
    {
        return view('listings.create');
    }

    //Store Listing Data
    public function store(Request $request)
    {
        //dd($request->all());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        //Make sure you know what is going in the database 
        //if using Model::unguard(); in AppServiceProvider
        Listing::create($formFields);

        return redirect('/')->with('message', 'Listing created successfully!');
        //return view('listings.index');
    }
}
