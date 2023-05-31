<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;
use Termwind\Components\Li;
use Throwable;

class RealtorListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

    public function index(Request $request): Response
    {
        $filters = ['deleted' => $request->boolean('deleted')];
        $listings = auth()->user()
            ->listings()
            ->filter($filters)
            ->withCount('images')
            ->withCount('offers')
            ->paginate(10);

        return Inertia::render('Realtor/Index', [
            'listings' => $listings
        ]);
    }

    public function show(Listing $listing)
    {
        return Inertia::render('Realtor/Show', [
            'listing' => $listing->load('offers', 'offers.bidder')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @throws Throwable
     */
    public function destroy(Listing $listing): RedirectResponse
    {
        $listing->deleteOrFail();
        return redirect()->back()->with('success', 'Listing deleted successfully');
    }
}
