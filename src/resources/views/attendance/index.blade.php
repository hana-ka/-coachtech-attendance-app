@extends('layouts.default')

@section('title', '勤怠')

<link rel="stylesheet" href="{{ asset('css/attendance.css') }}">

@section('content')
<div class="attendance">

    <div class="attendance-inner">

        <!-- status -->
        <div class="attendance-status">
            <span class="attendance-status__label">勤務外</span>
        </div>

        <!-- date -->
        <div class="attendance-date">
            <p class="attendance-date__day">2023年6月1日(木)</p>
            <p class="attendance-date__time">08:00</p>
        </div>

        <!-- action -->
        <div class="attendance-actions">
            <button class="attendance-button attendance-button--primary">出勤</button>
        </div>

    </div>
</div>
@endsection