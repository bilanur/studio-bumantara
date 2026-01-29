<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use App\Models\Booking;
use Illuminate\Http\Request;

class TimeSlotApiController extends Controller
{
    /**
     * Get available time slots for a specific date
     * Endpoint: GET /api/available-times
     */
    public function getAvailableTimeSlots(Request $request)
    {
        try {
            $date = $request->query('date');
            $timezone = $request->query('timezone', 'WIB');

            // Validate date format if provided
            if ($date && !strtotime($date)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Format tanggal tidak valid'
                ], 400);
            }

            // Get all active time slots, ordered by time
            $timeSlots = TimeSlot::where('is_active', true)
                ->orderBy('time', 'asc')
                ->get();

            $availableSlots = [];

            foreach ($timeSlots as $slot) {
                // Format time to HH:MM
                $timeValue = date('H:i', strtotime($slot->time));
                
                // Check if this time slot is already booked for the selected date
                $isBooked = false;
                
                if ($date) {
                    // Check bookings table
                    $isBooked = Booking::where('booking_date', $date)
                        ->where('booking_time', $slot->time)
                        ->whereIn('status', ['pending', 'confirmed', 'paid'])
                        ->exists();
                }

                $availableSlots[] = [
                    'id' => $slot->id,
                    'time' => $timeValue,
                    'time_full' => $slot->time,
                    'available' => !$isBooked,
                    'is_booked' => $isBooked
                ];
            }

            return response()->json([
                'success' => true,
                'date' => $date,
                'timezone' => $timezone,
                'time_slots' => $availableSlots,
                'total' => count($availableSlots)
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Check if specific time slot is available
     * Endpoint: GET /api/check-availability
     */
    public function checkAvailability(Request $request)
    {
        try {
            $date = $request->query('date');
            $time = $request->query('time');

            if (!$date || !$time) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tanggal dan waktu harus diisi'
                ], 400);
            }

            // Check if time slot exists and is active
            $timeSlot = TimeSlot::where('time', $time . ':00')
                ->where('is_active', true)
                ->first();

            if (!$timeSlot) {
                return response()->json([
                    'success' => false,
                    'available' => false,
                    'message' => 'Jam tidak tersedia'
                ]);
            }

            // Check if already booked
            $isBooked = Booking::where('booking_date', $date)
                ->where('booking_time', $time . ':00')
                ->whereIn('status', ['pending', 'confirmed', 'paid'])
                ->exists();

            return response()->json([
                'success' => true,
                'available' => !$isBooked,
                'is_booked' => $isBooked,
                'message' => $isBooked ? 'Jam sudah dibooking' : 'Jam tersedia'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500);
        }
    }
}