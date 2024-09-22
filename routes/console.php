<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('app:update-modules')->everyFiveMinutes();