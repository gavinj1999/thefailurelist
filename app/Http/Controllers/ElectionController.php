<?php

namespace App\Http\Controllers;

use App\Models\Election;
use App\Http\Requests\StoreElectionRequest;
use App\Http\Requests\UpdateElectionRequest;
use Inertia\Inertia;

class ElectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $elections = Election::with('member')->get();

        return Inertia::render('Elections/Index',[
            'elections' => $elections
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
    public function store(StoreElectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Election $election)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Election $election)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateElectionRequest $request, Election $election)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Election $election)
    {
        //
    }
}
