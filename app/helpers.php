<?php

if (!function_exists('date_diff_in_years')) {
    function date_diff_in_years($year, $month)
    {
        return Carbon\CarbonInterval::year(\Carbon\Carbon::now()->diffInYears(\Carbon\Carbon::createFromDate($year,
            $month)));
    }
}