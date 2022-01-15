<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function healthcheck()
    {
        return response()->json('Status: ok', 200);
    }
}
