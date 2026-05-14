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
}
