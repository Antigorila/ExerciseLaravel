<?php

namespace App\Http\Controllers;

use App\Models\SoulLink;
use App\Http\Requests\StoreSoulLinkRequest;
use App\Http\Requests\UpdateSoulLinkRequest;
use Illuminate\Support\Facades\Auth;

class SoulLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Auth::user()->soul_links);
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
    public function store(StoreSoulLinkRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SoulLink $soulLink)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SoulLink $soulLink)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSoulLinkRequest $request, SoulLink $soulLink)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SoulLink $soulLink)
    {
        //
    }
}
