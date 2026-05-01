@extends('layouts.default')

@section('title', '勤怠詳細')

@push('css')
<link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endpush

@section('content')
<div class="container">

    <!-- Title -->
    <h1 class="page-title">勤怠詳細</h1>

    <!-- Card -->
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
                <span class="detail__time detail__time--start">09:00</span>
                <span class="detail__separator">〜</span>
                <span class="detail__time detail__time--end">18:00</span>
            </div>
        </div>

        <!-- 休憩 -->
        <div class="detail__row">
            <p class="detail__label">休憩</p>
            <div class="detail__value detail__value--time">
                <span class="detail__time detail__time--start">12:00</span>
                <span class="detail__separator">〜</span>
                <span class="detail__time detail__time--end">13:00</span>
            </div>
        </div>

        <!-- 備考 -->
        <div class="detail__row">
            <p class="detail__label">備考</p>
            <p class="detail__value">
                <span class="detail__text">電車遅延のため</span>
            </p>
        </div>

    </div>

    <!-- 注意文 -->
    <p class="detail__note">※承認待ちのため修正はできません。</p>

</div>
@endsection