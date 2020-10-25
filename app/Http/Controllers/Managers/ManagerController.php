<?php

namespace App\Http\Controllers\Managers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function stats()
    {
        return view('managers.statistic');
    }
}
