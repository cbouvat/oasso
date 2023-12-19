<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionTypeRequest;
use App\Http\Requests\UpdateSubscriptionTypeRequest;
use App\Models\SubscriptionType;

class SubscriptionTypeController extends Controller
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
    public function store(StoreSubscriptionTypeRequest $request): void
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SubscriptionType $subscriptionType): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubscriptionType $subscriptionType): void
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubscriptionTypeRequest $request, SubscriptionType $subscriptionType): void
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubscriptionType $subscriptionType): void
    {
        //
    }
}
