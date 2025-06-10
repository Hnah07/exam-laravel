<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Trips API",
 *     description="API for managing trips"
 * )
 */
class TripController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/trips",
     *     summary="Get all trips",
     *     tags={"Trips"},
     *     @OA\Response(
     *         response=200,
     *         description="List of trips",
     *         @OA\JsonContent(
     *             @OA\Property(property="data", type="array",
     *                 @OA\Items(
     *                     @OA\Property(property="id", type="integer", example=1),
     *                     @OA\Property(property="title", type="string", example="Summer Beach Vacation"),
     *                     @OA\Property(property="region", type="string", example="Mediterranean"),
     *                     @OA\Property(property="start_date", type="string", format="date", example="2024-07-01"),
     *                     @OA\Property(property="duration_days", type="integer", example=7),
     *                     @OA\Property(property="price_per_person", type="number", format="float", example=1299.99)
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function index()
    {
        $trips = Trip::all();
        return response()->json([
            'data' => $trips
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        //
    }
}
