<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Attendance;
use App\Models\BreakTime;
use App\Models\CorrectionRequest;
use App\Models\CorrectionRequestBreak;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => '一般ユーザー',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'role' => 'user',
        ]);

        $admin = User::create([
            'name' => '管理者',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $attendance1 = Attendance::create([
            'user_id' => $user->id,
            'work_date' => now()->subDays(1)->toDateString(),
            'clock_in' => now()->subDays(1)->setHour(9),
            'clock_out' => now()->subDays(1)->setHour(18),
            'status' => 'finished',
        ]);

        BreakTime::create([
            'attendance_id' => $attendance1->id,
            'break_start' => now()->subDays(1)->setHour(12),
            'break_end' => now()->subDays(1)->setHour(13),
        ]);

        BreakTime::create([
            'attendance_id' => $attendance1->id,
            'break_start' => now()->subDays(1)->setHour(15),
            'break_end' => now()->subDays(1)->setHour(15)->addMinutes(30),
        ]);

        Attendance::create([
            'user_id' => $user->id,
            'work_date' => now()->toDateString(),
            'clock_in' => now()->subHours(3),
            'clock_out' => null,
            'status' => 'working',
        ]);

        $attendance3 = Attendance::create([
            'user_id' => $user->id,
            'work_date' => now()->subDays(2)->toDateString(),
            'clock_in' => now()->subDays(2)->setHour(9),
            'clock_out' => null,
            'status' => 'break',
        ]);

        BreakTime::create([
            'attendance_id' => $attendance3->id,
            'break_start' => now()->subDays(2)->setHour(12),
            'break_end' => null,
        ]);

        $request = CorrectionRequest::create([
            'user_id' => $user->id,
            'attendance_id' => $attendance1->id,
            'status' => 'pending',
            'requested_clock_in' => now()->subDays(1)->setHour(8),
            'requested_clock_out' => now()->subDays(1)->setHour(18),
            'note' => '打刻忘れのため修正',
        ]);

        CorrectionRequestBreak::create([
            'correction_request_id' => $request->id,
            'break_start' => now()->subDays(1)->setHour(11),
            'break_end' => now()->subDays(1)->setHour(12),
        ]);
    }
}
