<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RealtorListingAcceptOfferController extends Controller
{
    public function __invoke(Offer $offer): RedirectResponse
    {
        $listing = $offer->listing;
        $this->authorize('update', $listing);

        // accept selected offer
        $offer->update(['accepted_at' => now()]);
        $listing->sold_at = now();
        $listing->save();

        // Rejected all other offers
        $listing->offers()->except($offer)->update(['rejected_at' => now()]);

        return redirect()->back()->with('success', "Offer #{$offer->id} accepted");
    }
}
