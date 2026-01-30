<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class AdminTimeSlotController extends Controller
{
    public function index()
    {
        $timeSlots = TimeSlot::orderBy('time')->get();
        return view('admin.timeslots.index', compact('timeSlots'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'time' => 'required|unique:time_slots,time'
        ]);

        TimeSlot::create([
            'time' => $request->time . ':00',
            'is_active' => 1
        ]);

        return back()->with('success', 'Jam berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        TimeSlot::findOrFail($id)->update([
            'time' => $request->time . ':00'
        ]);

        return back()->with('success', 'Jam berhasil diupdate');
    }

    public function destroy($id)
    {
        TimeSlot::findOrFail($id)->delete();

        return back()->with('success', 'Jam dihapus');
    }

    public function toggle($id)
    {
        $slot = TimeSlot::findOrFail($id);
        $slot->update(['is_active' => !$slot->is_active]);

        return back()->with('success', 'Status diubah');
    }

    public function bulkCreate(Request $request)
    {
        $start = strtotime($request->start_time);
        $end = strtotime($request->end_time);
        $interval = $request->interval * 60;

        for ($i = $start; $i <= $end; $i += $interval) {
            TimeSlot::firstOrCreate([
                'time' => date('H:i:s', $i)
            ], ['is_active' => 1]);
        }

        return back()->with('success', 'Jam massal dibuat');
    }
}
