<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Redirect;

class ListingController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): Response
    {

        $filters = $request->only([
            'priceFrom', 'priceTo', 'beds', 'baths', 'areaFrom', 'areaTo'
        ]);

        return Inertia::render(
            'Listing/Index',
            [
                'filters' => $filters,
                'listings' => Listing::mostRecent()
                    ->filter($filters)
                    ->withoutSold()
                    ->paginate(10)
                    ->withQueryString()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Listing/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->user()->listings()->create($request->validate([
            'beds' => 'required|numeric|min:0|max:20',
            'baths' => 'required|numeric|min:0|max:20',
            'area' => 'required|numeric|min:15|max:1500',
            'city' => 'required|string',
            'code' => 'required|numeric',
            'street' => 'required|string',
            'street_nr' => 'required|min:1|max:1000',
            'price' => 'required|numeric|min:0|max:2000000',
        ]));
        return redirect()->route('listing.index')->with('success', 'Listing created successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing): Response
    {
        $listing->load(['images']);
        $offer = !Auth::user() ? null : $listing->offers()->byMe()->first();
        return Inertia::render('Listing/Show', [
            'listing' => $listing,
            'offerMade' => $offer
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing): Response
    {
        return Inertia::render('Listing/Edit', [
            'listing' => $listing]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Listing $listing): RedirectResponse
    {
        $listing->update($request->validate([
            'beds' => 'required|numeric|min:0|max:20',
            'baths' => 'required|numeric|min:0|max:20',
            'area' => 'required|numeric|min:15|max:1500',
            'city' => 'required|string',
            'code' => 'required|numeric',
            'street' => 'required|string',
            'street_nr' => 'required|min:1|max:1000',
            'price' => 'required|numeric|min:0|max:2000000',
        ]));
        return redirect()->route('listing.index')->with('success', 'Listing updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing): RedirectResponse
    {

    }
}
