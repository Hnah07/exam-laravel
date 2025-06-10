<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

/**
 * @OA\Tag(
 *     name="Bookings",
 *     description="API Endpoints for managing bookings"
 * )
 */
class BookingController extends Controller
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
     * @OA\Post(
     *     path="/api/bookings",
     *     summary="Create a new booking",
     *     tags={"Bookings"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"trip_id", "name", "email", "number_of_people"},
     *             @OA\Property(property="trip_id", type="integer", example=1, description="ID of the trip to book"),
     *             @OA\Property(property="name", type="string", example="Jane Doe", description="Name of the person making the booking"),
     *             @OA\Property(property="email", type="string", format="email", example="jane@example.com", description="Email address of the person making the booking"),
     *             @OA\Property(property="number_of_people", type="integer", minimum=1, example=3, description="Number of people for the booking")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Booking created successfully",
     *         @OA\JsonContent(
     *             @OA\Property(property="trip_id", type="integer", example=1),
     *             @OA\Property(property="name", type="string", example="Jane Doe"),
     *             @OA\Property(property="email", type="string", format="email", example="jane@example.com"),
     *             @OA\Property(property="number_of_people", type="integer", example=3),
     *             @OA\Property(property="token", type="string", example="2b615be78cf18a80066ec15d08663b17")
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="The given data was invalid."),
     *             @OA\Property(
     *                 property="errors",
     *                 type="object",
     *                 @OA\Property(
     *                     property="trip_id",
     *                     type="array",
     *                     @OA\Items(type="string", example="The selected trip id is invalid.")
     *                 ),
     *                 @OA\Property(
     *                     property="name",
     *                     type="array",
     *                     @OA\Items(type="string", example="The name field is required.")
     *                 ),
     *                 @OA\Property(
     *                     property="email",
     *                     type="array",
     *                     @OA\Items(type="string", example="The email must be a valid email address.")
     *                 ),
     *                 @OA\Property(
     *                     property="number_of_people",
     *                     type="array",
     *                     @OA\Items(type="string", example="The number of people must be at least 1.")
     *                 )
     *             )
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'trip_id' => ['required', 'exists:trips,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'number_of_people' => ['required', 'integer', 'min:1'],
        ]);

        // Calculate token
        $token = md5($validated['email'] . 'canadarocks');

        // Create booking with pending status
        $booking = Booking::create([
            'trip_id' => $validated['trip_id'],
            'name' => $validated['name'],
            'email' => $validated['email'],
            'number_of_people' => $validated['number_of_people'],
            'status' => 'pending',
            'token' => $token
        ]);

        // Return only the specified fields
        return response()->json([
            'trip_id' => $booking->trip_id,
            'name' => $booking->name,
            'email' => $booking->email,
            'number_of_people' => $booking->number_of_people,
            'token' => $booking->token
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
