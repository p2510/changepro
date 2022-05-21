<?php

namespace App\Http\Controllers;

use App\Models\Signalman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignalmanController extends Controller
{
    public function signal(int $id)
    {
        Signalman::create([
            "status"=>true,
            "transfer_id"=>$id,
            "user_id"=>Auth::user()->id
        ]);
       return  redirect()->back();
         
    }
}
