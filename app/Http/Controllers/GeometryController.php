<?php

namespace App\Http\Controllers;

use App\Models\Geometry;
use App\Http\Requests\StoreGeometryRequest;
use App\Http\Requests\UpdateGeometryRequest;

class GeometryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreGeometryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Geometry $geometry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Geometry $geometry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGeometryRequest $request, Geometry $geometry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Geometry $geometry)
    {
        //
    }
}
