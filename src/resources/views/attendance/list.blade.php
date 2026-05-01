@extends('layouts.default')

@section('title', '勤怠一覧')

@push('css')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endpush

@section('content')
<div class="container">


    <!-- Title -->
    <h1 class="page-title">勤怠一覧</h1>

    <!-- Header -->
    <div class="list__header">
        <button class="list__nav-btn">← 前月</button>
        <h2 class="list__month">2023年6月</h2>
        <button class="list__nav-btn">翌月 →</button>
    </div>

    <!-- Table -->
    <div class="list__table-wrapper">
        <table class="list__table">
            <thead>
                <tr>
                    <th class="list__th">日付</th>
                    <th class="list__th">出勤</th>
                    <th class="list__th">退勤</th>
                    <th class="list__th">休憩</th>
                    <th class="list__th">合計</th>
                    <th class="list__th">詳細</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 5; $i++)
                <tr>
                    <td class="list__td">2023/06/0{{ $i }}</td>
                    <td class="list__td">09:00</td>
                    <td class="list__td">18:00</td>
                    <td class="list__td">01:00</td>
                    <td class="list__td">08:00</td>
                    <td class="list__td"><a class="list__link" href="#">詳細</a></td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>

</div>
@endsection