@extends('layouts.default')

@section('title', '申請一覧')

@push('css')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endpush

@section('content')
<div class="container">

    <!-- Title -->
    <h1 class="page-title">申請一覧</h1>

    <!-- Tabs -->
    <div class="list__tabs">
        <p class="list__tab list__tab--active">承認待ち</p>
        <p class="list__tab">承認済み</p>
    </div>

    <!-- Table -->
    <div class="list__table-wrapper">
        <table class="list__table">
            <thead>
                <tr>
                    <th class="list__th">状態</th>
                    <th class="list__th">名前</th>
                    <th class="list__th">対象日時</th>
                    <th class="list__th">申請理由</th>
                    <th class="list__th">申請日時</th>
                    <th class="list__th">詳細</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= 8; $i++)
                <tr>
                    <td class="list__td">承認待ち</td>
                    <td class="list__td">西怜奈</td>
                    <td class="list__td">2023/06/01</td>
                    <td class="list__td">遅延のため</td>
                    <td class="list__td">2023/06/02</td>
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