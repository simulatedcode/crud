<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

class DateTimeController extends Controller
{
    public function newDateFormat()
    {
        $dateTime = date('Y-m-d H:i:s');
        $updatedDateFormat = Carbon::createFromFormat('Y-m-d H:i:s', $dateTime)->format('m-d-Y H:i:s');
        print('<pre>' . print_r($updatedDateFormat, true) . '</pre>');
    }
}
