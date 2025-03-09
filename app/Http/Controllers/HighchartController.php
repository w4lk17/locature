<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\User;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HighchartController extends Controller
{

    public function handleStat()
    {
        DB::table('invoices')->where('etat', 'Payée')->sum('perçu');

        $userData = User::select(\DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(\DB::raw("Month(created_at)"))
            ->pluck('count');

        $earningData = Invoice::select(DB::raw('SUM(perçu) as sum'), DB::raw('MONTH(created_at) as month'))
            ->where('etat', 'Payée')
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        $data = array_fill(0, 12, 0);

        foreach ($earningData as $d) {
            $data[$d->month - 1] = $d->sum;
        }

        return view('admins.statistic', compact('userData','data'));
    }
}
