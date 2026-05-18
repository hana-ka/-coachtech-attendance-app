<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CorrectionRequest;


class AdminCorrectionRequestController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->status ?? 'pending';

        $requests = CorrectionRequest::with([
                'user',
                'attendance',
            ])
            ->where('status', $status)
            ->latest()
            ->get();

        return view(
            'admin.correction_request.list',
            compact(
                'requests',
                'status'
            )
        );
    }

    public function show($id)
    {
        $request = CorrectionRequest::with([
                'user',
                'attendance',
                'correctionRequestBreaks',
            ])
            ->findOrFail($id);

        return view(
            'admin.correction_request.detail',
            compact('request')
        );
    }

    public function approve($id)
    {
        $correctionRequest = CorrectionRequest::with([
                'attendance',
                'correctionRequestBreaks',
            ])
            ->findOrFail($id);

        $attendance = $correctionRequest->attendance;

        $attendance->update([
            'clock_in' =>
                $correctionRequest->requested_clock_in,

            'clock_out' =>
                $correctionRequest->requested_clock_out,
        ]);

        $attendance->breakTimes()->delete();

        foreach (
            $correctionRequest->correctionRequestBreaks
            as $break
        ) {

            $attendance->breakTimes()->create([
                'break_start' => $break->break_start,

                'break_end' => $break->break_end,
            ]);
        }

        $correctionRequest->update([
            'status' => 'approved',
        ]);

        return redirect()
            ->route(
                'admin.request.approve',
                $correctionRequest->id
            );
    }
}
