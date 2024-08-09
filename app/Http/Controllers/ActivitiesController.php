<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;

class ActivitiesController extends Controller
{
    public function activitie()
    {
        $notifications = Sentinel::getUser()->unreadNotifications;

        return view('activitie.activity', compact('notifications'));
    }

    public function markNotification(Request $request)
    {
        Sentinel::getUser()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}
