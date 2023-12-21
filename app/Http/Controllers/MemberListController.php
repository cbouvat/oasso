<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberShipRequest;
use App\Http\Requests\UpdateMemberShipRequest;
use App\Models\MemberShip;

class MemberListController extends Controller
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
    public function store(StoreMemberShipRequest $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MemberShip $MemberShip): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MemberShip $MemberShip): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMemberShipRequest $request, MemberShip $MemberShip): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MemberShip $MemberShip): void
    {
        //
    }
}
