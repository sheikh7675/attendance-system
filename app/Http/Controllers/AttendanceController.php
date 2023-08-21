<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function checkIn() {
        $attendance = new Attendance();
        $attendance->user_id = auth()->id();
        $attendance->type = "Check In";
        $attendance->save();

        return redirect()->route('home')->with('success', 'Successfully checked in!');
    }

    public function checkOut() {
        $attendance = new Attendance();
        $attendance->user_id = auth()->id();
        $attendance->type = "Check Out";
        $attendance->save();

        return redirect()->route('home')->with('success', 'Successfully checked out!');
    }

    public function edit($id) {
        $attendance = Attendance::query()->where('id', $id)->first();

        return view('edit', compact('attendance'));
    }

    public function update($id) {
        $attendance = Attendance::query()->where('id', $id)->first();
        $attendance->type = request()->type;
        $attendance->save();

        return redirect()->route('home')->with('success', 'Successfully updated!');

    }

    public function delete($id) {
        Attendance::destroy($id);

        return redirect()->route('home')->with('success', 'Successfully deleted!');
    }
}