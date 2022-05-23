<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Recharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RechargeController extends Controller
{
    public function index()
    {
       $urlLogo=url("public/storage/img/logo.png");
       $data_recharge=Recharge::where("user_id",Auth::user()->id)->get();
       return Inertia::render("Recharge")->with([
        'urlLogo' => $urlLogo,
        "amount"=>$data_recharge[0]["amount"]
       ]);
    }
}
