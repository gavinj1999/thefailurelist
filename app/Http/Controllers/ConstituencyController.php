<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Http\Requests\StoreConstituencyRequest;
use App\Http\Requests\UpdateConstituencyRequest;
use Inertia\Inertia;
class ConstituencyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $constituencies = Constituency::with('member')->get();
        return Inertia::render('Constituencies/Index', [
            'constituencies' => $constituencies
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
    public function store(StoreConstituencyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $constituency = Constituency::with('member')->where('slug', $slug)->first();

        return Inertia::render('Constituencies/Show',
    [
        'constituency' => $constituency,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Constituency $constituency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConstituencyRequest $request, Constituency $constituency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Constituency $constituency)
    {
        //
    }
}
