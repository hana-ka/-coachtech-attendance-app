<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AdminAttendanceController extends Controller
{
    public function index(Request $request)
    {
        $currentDate = $request->date
            ? Carbon::parse($request->date)
            : now();

        $attendances = Attendance::with([
                'user',
                'breakTimes',
            ])
            ->whereDate('work_date', $currentDate)
            ->get();

        return view(
            'admin.attendance.list',
            compact(
                'attendances',
                'currentDate'
            )
        );
    }

    public function show($id)
    {
        $attendance = Attendance::with([
                'user',
                'breakTimes',
                'correctionRequests.correctionRequestBreaks',
            ])
            ->findOrFail($id);

        $latestRequest = $attendance->correctionRequests
            ->sortByDesc('created_at')
            ->first();

        return view(
            'admin.attendance.detail',
            compact(
                'attendance',
                'latestRequest'
            )
        );
    }
}
