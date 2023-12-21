<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberShipTypeRequest;
use App\Http\Requests\UpdateMemberShipTypeRequest;
use App\Models\MemberShipType;

class MemberShipTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): void
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): void
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMemberShipTypeRequest $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberShipType $membershipType): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemberShipType $membershipType): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberShipTypeRequest $request, MemberShipType $membershipType): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberShipType $membershipType): void
    {
        //
    }
}
