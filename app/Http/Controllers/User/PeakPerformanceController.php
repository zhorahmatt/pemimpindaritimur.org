<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PeakPerformanceController extends Controller
{
    public function __invoke()
    {
        return inertia('User/PeakPerformance/Index', []);
    }
}
