<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Recharge;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $recharge_exist=Recharge::where("user_id",Auth::user()->id)->get();
        if (count($recharge_exist)===0) {
            Recharge::create([
                "amount"=>0,
                "user_id"=>Auth::user()->id, // initialize the amount recharge 
            ]);
        }
        $data_transfer=DB::table('transfers')
        ->where("transfers.status","progressing")
        ->join('users', 'transfers.user_id', '=', 'users.id')
        ->select("transfers.*","users.name","users.surname")
       ->orderByDesc('transfers.created_at')
       ->paginate(8);
  
        $urlLogo=url("storage/img/logo.png");
        return Inertia::render('Dashboard',[
            'urlLogo' => $urlLogo,
            "data_transfer"=>$data_transfer,

        ]);
    }
}
