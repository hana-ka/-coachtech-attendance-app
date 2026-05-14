<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Attendance;
use Carbon\Carbon;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();

        return view('admin.user.list',compact('users'));
    }

    public function attendance(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $currentMonth = $request->month
            ? Carbon::parse($request->month)
            : now();

        $attendances = Attendance::with('breakTimes')
            ->where('user_id', $user->id)
            ->whereYear(
                'work_date',
                $currentMonth->year
            )
            ->whereMonth(
                'work_date',
                $currentMonth->month
            )
            ->orderBy('work_date')
            ->get();

        return view(
            'admin.attendance.user_list',
            compact(
                'user',
                'attendances',
                'currentMonth'
            )
        );
    }
}
