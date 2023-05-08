<?php

namespace App\Http\Controllers;

use App\Models\action;
use App\Http\Requests\StoreactionRequest;
use App\Http\Requests\UpdateactionRequest;

class ActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\action  $action
     * @return \Illuminate\Http\Response
     */
    public function show(action $action)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\action  $action
     * @return \Illuminate\Http\Response
     */
    public function edit(action $action)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateactionRequest  $request
     * @param  \App\Models\action  $action
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateactionRequest $request, action $action)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\action  $action
     * @return \Illuminate\Http\Response
     */
    public function destroy(action $action)
    {
        //
    }
}
