<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;
use App\Http\Requests\AttendanceUpdateRequest;

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

    public function update(
        AttendanceUpdateRequest $request,
        $id
    )
    {
        $attendance = Attendance::findOrFail($id);

        $attendance->update([

            'clock_in' => $attendance->work_date
                ->format('Y-m-d')
                . ' '
                . $request->clock_in,

            'clock_out' => $attendance->work_date
                ->format('Y-m-d')
                . ' '
                . $request->clock_out,

        ]);

        $attendance->breakTimes()->delete();

        foreach (
            $request->break_start
            as $index => $breakStart
        ) {

            if (
                !$breakStart ||
                !$request->break_end[$index]
            ) {
                continue;
            }

            $attendance->breakTimes()->create([

                'break_start' =>
                    $attendance->work_date
                    ->format('Y-m-d')
                    . ' '
                    . $breakStart,

                'break_end' =>
                    $attendance->work_date
                    ->format('Y-m-d')
                    . ' '
                    . $request->break_end[$index],
            ]);
        }

        return redirect()
            ->route(
                'admin.attendance.detail',
                $attendance->id
            );
    }
}
