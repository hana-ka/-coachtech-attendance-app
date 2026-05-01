@extends('layouts.default')

@section('title', 'スタッフ一覧')

@push('css')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endpush

@section('content')
<div class="container">

    <!-- Title -->
    <h1 class="page-title">スタッフ一覧</h1>

    <!-- Table -->
    <div class="list__table-wrapper">
        <table class="list__table">
            <thead>
                <tr>
                    <th class="list__th">名前</th>
                    <th class="list__th">メールアドレス</th>
                    <th class="list__th">月次勤怠</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 6; $i++)
                <tr>
                    <td class="list__td">西怜奈</td>
                    <td class="list__td">reina@coachtech.com</td>
                    <td class="list__td">
                        <a href="#" class="list__link">詳細</a>
                    </td>
                </tr>
                @endfor
            </tbody>
        </table>
    </div>

</div>
@endsection