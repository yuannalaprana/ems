<?php

namespace App\Http\Controllers;

use App\Models\LoginInformation;
use App\Models\Position;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $now = Carbon::now()->format('Y-m-d');
        $defaultStart = "2024-01-01";
        $startDate = $request->start_date ? Carbon::parse($request->start_date)->format('Y-m-d') : $defaultStart;
        $endDate = $request->end_date ? Carbon::parse($request->end_date)->format('Y-m-d') : $now;

        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();

        $loginInformation = LoginInformation::leftJoin('users', 'users.id', '=', 'login_informations.user_id')
            ->select('users.id as userId', 'users.name', DB::raw('count(*) as amount'))
            ->groupBy('userId', 'users.name')
            ->whereBetween('login_informations.created_at', [$startDate, $endDate])
            ->orderBy('amount', 'desc')
            ->havingRaw(true)
            ->get();

        $positionCount = Position::all()->count();
        $loginCount = LoginInformation::whereBetween('created_at', [$startDate, $endDate])->count();
        $userCount = User::whereBetween('date_joined', [$startDate, $endDate])->count();

        $now = Carbon::now()->format('d/m/Y');

        return view('dashboards.index', [
            'loginInformation'  => $loginInformation,
            'positionCount'     => $positionCount,
            'loginCount'        => $loginCount,
            'userCount'         => $userCount,
            'startDate'         => $startDate->format("d/m/Y"),
            'endDate'           => $endDate->format("d/m/Y"),
        ]);

    }
    

}
