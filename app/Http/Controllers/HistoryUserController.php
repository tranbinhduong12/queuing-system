<?php

namespace App\Http\Controllers;

use App\Models\history_user;
use App\Http\Requests\Storehistory_userRequest;
use App\Http\Requests\Updatehistory_userRequest;

class HistoryUserController extends Controller
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
     * @param  \App\Http\Requests\Storehistory_userRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storehistory_userRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\history_user  $history_user
     * @return \Illuminate\Http\Response
     */
    public function show(history_user $history_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\history_user  $history_user
     * @return \Illuminate\Http\Response
     */
    public function edit(history_user $history_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatehistory_userRequest  $request
     * @param  \App\Models\history_user  $history_user
     * @return \Illuminate\Http\Response
     */
    public function update(Updatehistory_userRequest $request, history_user $history_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\history_user  $history_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(history_user $history_user)
    {
        //
    }
}
