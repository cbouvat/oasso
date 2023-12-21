<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMembershipTypeRequest;
use App\Http\Requests\UpdateMembershipTypeRequest;
use App\Models\MembershipType;

class MembershipTypeController extends Controller
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
    public function store(StoreMembershipTypeRequest $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MembershipType $membershipType): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MembershipType $membershipType): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMembershipTypeRequest $request, MembershipType $membershipType): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MembershipType $membershipType): void
    {
        //
    }
}
