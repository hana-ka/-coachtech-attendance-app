@extends('layouts.default')

@section('title', '勤怠詳細')

@push('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush

@section('content')
<div class="container">

    <h1 class="page-title">勤怠詳細</h1>

    <form action="#" method="POST">
        @csrf
        <div class="detail__card">

            <!-- 名前 -->
            <div class="detail__row">
                <p class="detail__label">名前</p>
                <p class="detail__value">
                    <span class="detail__text">西 怜奈</span>
                </p>
            </div>

            <!-- 日付 -->
            <div class="detail__row">
                <p class="detail__label">日付</p>
                <div class="detail__value detail__value--date">
                    <span class="detail__year">2023年</span>
                    <span class="detail__date">6月1日</span>
                </div>
            </div>

            <!-- 出勤・退勤 -->
                <div class="detail__row">
                    <p class="detail__label">出勤・退勤</p>
                    <div class="detail__value detail__value--time">
                        <input type="time" class="detail__input" value="09:00">
                        <span class="detail__separator">〜</span>
                        <input type="time" class="detail__input" value="18:00">
                    </div>
                </div>

                <!-- 休憩 -->
                <div class="detail__row">
                    <p class="detail__label">休憩</p>
                    <div class="detail__value detail__value--time">
                        <input type="time" class="detail__input" value="12:00">
                        <span class="detail__separator">〜</span>
                        <input type="time" class="detail__input" value="13:00">
                    </div>
                </div>

                <!-- 休憩2 -->

                <div class="detail__row">
                    <p class="detail__label">休憩2</p>
                    <div class="detail__value detail__value--time">
                        <input type="time" class="detail__input">
                        <span class="detail__separator">〜</span>
                        <input type="time" class="detail__input">
                    </div>

                </div>

                <!-- 備考 -->
                <div class="detail__row">
                    <p class="detail__label">備考</p>
                    <p class="detail__value">
                        <textarea class="detail__textarea"></textarea>
                    </p>
                </div>

        </div>

        <div class="detail__actions">
                <button type="submit" class="detail__button">修正</button>
        </div>

    </form>

</div>
@endsection