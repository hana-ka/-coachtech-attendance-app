<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Attendance;
use App\Models\BreakTime;

class AttendanceController extends Controller
{
    public function index()
    {
        $now = now();

        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('work_date', today())
            ->first();

        $status = 'off';

        $statusLabels = [
            'off' => '勤務外',
            'working' => '出勤中',
            'break' => '休憩中',
            'done' => '退勤済',
        ];

        if ($attendance) {
            $status = $attendance->status;
        }

        $statusLabel = $statusLabels[$status];

        return view('attendance.index', compact(
            'now',
            'status',
            'attendance',
            'statusLabel'
        ));
    }

    public function clockIn()
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('work_date', today())
            ->first();

        if ($attendance) {
            return redirect('/attendance');
        }

        Attendance::create([
            'user_id' => auth()->id(),
            'work_date' => today(),
            'status' => 'working',
            'clock_in' => now(),
        ]);

        return redirect('/attendance');
    }

    public function breakStart()
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('work_date', today())
            ->first();

        BreakTime::create([
            'attendance_id' => $attendance->id,
            'break_start' => now(),
        ]);

        $attendance->update([
            'status' => 'break',
        ]);

        return redirect('/attendance');
    }

    public function breakEnd()
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('work_date', today())
            ->first();

        $breakTime = BreakTime::where('attendance_id', $attendance->id)
            ->whereNull('break_end')
            ->latest()
            ->first();

        $breakTime->update([
            'break_end' => now(),
        ]);

        $attendance->update([
            'status' => 'working',
        ]);

        return redirect('/attendance');
    }

    public function clockOut()
    {
        $attendance = Attendance::where('user_id', auth()->id())
            ->whereDate('work_date', today())
            ->first();

        if ($attendance->status !== 'working') {
            return redirect('/attendance');
        }

        $attendance->update([
            'status' => 'done',
            'clock_out' => now(),
        ]);

        return redirect('/attendance');
    }
}
