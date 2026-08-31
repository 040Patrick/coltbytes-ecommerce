<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


Artisan::command('teste', function () {
    var_dump(DB::table('users')->get());
})->purpose('Display db::table informations.');


Schedule::command('app:delete-expired-users')->daily();