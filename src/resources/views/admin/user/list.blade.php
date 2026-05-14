@extends('layouts.default')

@section('title', 'スタッフ一覧')

@push('css')
<link rel="stylesheet" href="{{ asset('css/list.css') }}">
@endpush

@section('content')
<div class="container">

    <h1 class="page-title">スタッフ一覧</h1>

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
                @foreach ($users as $user)
                <tr>
                    <td class="list__td">{{ $user->name }}</td>
                    <td class="list__td">{{ $user->email }}</td>
                    <td class="list__td">
                        <a
                            href="{{ route('admin.staff.attendance', $user->id) }}"
                            class="list__link"
                        >
                            詳細
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>
@endsection