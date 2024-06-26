<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Carbon;
use App\Models\Tour;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('app:tour-expiration-command', function () {
    $now = Carbon::now();
    // Update status to "chưa bắt đầu" (0) if departure_day is in the future
    Tour::where('departure_day', '>', $now)
        ->update(['t_status' => 0]);

    // Update status to "đang đi" (1) if current time is between departure_day and return_day
    Tour::where('departure_day', '<=', $now)
        ->where('return_day', '>=', $now)
        ->update(['t_status' => 1]);

    // Update status to "hết hạn" (2) if return_day is in the past
    Tour::where('return_day', '<', $now)
        ->update(['t_status' => 2]);
})->purpose('Display an inspiring quote')->everySecond();
