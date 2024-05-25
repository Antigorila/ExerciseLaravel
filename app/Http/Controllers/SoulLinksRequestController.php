<?php

namespace App\Http\Controllers;

use App\Models\SoulLinksRequest;
use App\Http\Requests\StoreSoulLinksRequestRequest;
use App\Http\Requests\UpdateSoulLinksRequestRequest;
use Illuminate\Support\Facades\Auth;

class SoulLinksRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Auth::user()->incoming_soul_links_requests);
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
    public function store(StoreSoulLinksRequestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SoulLinksRequest $soulLinksRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SoulLinksRequest $soulLinksRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoulLinksRequestRequest $request, SoulLinksRequest $soulLinksRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SoulLinksRequest $soulLinksRequest)
    {
        //
    }
}
