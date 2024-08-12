<?php

namespace App\Http\Controllers;

use App\Models\Opposition;
use App\Http\Requests\StoreOppositionRequest;
use App\Http\Requests\UpdateOppositionRequest;
use Inertia\Inertia;

class OppositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $opposition = Opposition::with('member')->get();
        return Inertia::render('Opposition/Index',
        [
            'opposition' => $opposition
        ]
        );
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
    public function store(StoreOppositionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Opposition $opposition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Opposition $opposition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOppositionRequest $request, Opposition $opposition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Opposition $opposition)
    {
        //
    }
}
