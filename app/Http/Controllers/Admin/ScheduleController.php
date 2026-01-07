<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::orderBy('date')->orderBy('time')->get();
        return view('admin.schedule.index', compact('schedules'));
    }

    public function create()
    {
        return view('admin.schedule.create');
    }

    public function store(Request $request)
    {
        Schedule::create([
            'date' => $request->date,
            'time' => $request->time,
            'is_available' => $request->is_available ?? true,
        ]);

        return redirect('/admin/schedule')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $schedule = Schedule::findOrFail($id);
        return view('admin.schedule.edit', compact('schedule'));
    }

    public function update(Request $request, $id)
    {
        $schedule = Schedule::findOrFail($id);

        $schedule->update([
            'date' => $request->date,
            'time' => $request->time,
            'is_available' => $request->is_available ?? false,
        ]);

        return redirect('/admin/schedule')->with('success', 'Jadwal berhasil diupdate');
    }

    public function destroy($id)
    {
        Schedule::destroy($id);
        return redirect('/admin/schedule')->with('success', 'Jadwal berhasil dihapus');
    }
}
