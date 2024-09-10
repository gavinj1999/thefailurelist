<?php

namespace App\Http\Controllers;

use App\Models\Promise;
use App\Http\Requests\StorePromiseRequest;
use App\Http\Requests\UpdatePromiseRequest;

class PromiseController extends Controller
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
    public function store(StorePromiseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Promise $promise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promise $promise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromiseRequest $request, Promise $promise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promise $promise)
    {
        //
    }
}
