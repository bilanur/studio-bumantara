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
        TimeSlot::create([
            'time' => $request->time . ':00',
            'is_active' => true
        ]);

        return response()->json(['success'=>true,'message'=>'Jam ditambahkan']);
    }

    public function update(Request $request, $id)
    {
        TimeSlot::find($id)->update([
            'time'=>$request->time.':00'
        ]);

        return response()->json(['success'=>true]);
    }

    public function destroy($id)
    {
        TimeSlot::destroy($id);
        return response()->json(['success'=>true]);
    }

    public function toggle($id)
    {
        $slot = TimeSlot::find($id);
        $slot->is_active = !$slot->is_active;
        $slot->save();

        return response()->json(['success'=>true]);
    }

    public function bulkCreate(Request $request)
    {
        $start = strtotime($request->start_time);
        $end = strtotime($request->end_time);
        $interval = $request->interval * 60;

        for ($i=$start;$i<=$end;$i+=$interval) {
            $time = date('H:i:s',$i);

            TimeSlot::firstOrCreate([
                'time'=>$time
            ],[
                'is_active'=>true
            ]);
        }

        return response()->json(['success'=>true,'message'=>'Jam massal dibuat']);
    }
}
