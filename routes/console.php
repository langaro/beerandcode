<?php

use App\Jobs\HandleGithubFetching;
use Illuminate\Support\Facades\Schedule;

Schedule::job(new HandleGithubFetching())->dailyAt('06:00');
