<?php

namespace App\Http\Controllers;

use App\Models\Party;
use App\Models\Member;
use App\Http\Requests\StorePartyRequest;
use App\Http\Requests\UpdatePartyRequest;
use Inertia\Inertia;
class PartyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parties = Party::with('members')->orderBy('name')->get();
        return Inertia::render('Parties/Index',
    [
        'parties' => $parties
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePartyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $party = Party::where('slug', $slug)->with('members')->firstOrFail();
        $members = Member::where('party_id', $party->id);

        return Inertia::render('Parties/Show',
        [
            'party'=> $party,
            'members'=> $members
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Party $party)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePartyRequest $request, Party $party)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Party $party)
    {
        //
    }
}
