<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Recharge;
use App\Models\Transfer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(["AccessAdmin"])->except(["index","logout","login"]);
    }
    /* login admin */
    public function index(Request $request)
    {
        if($request->session()->get('identify')!==null && $request->session()->get('password')!==null) {
            if ($request->session()->get('identify')==="AdminChangePro" && $request->session()->get('password')==="01233378marie") {
                return redirect()->route("admin.dashboard");
            }else {
                return Inertia::render("Admin/Auth/Login");
            }
        }else{
            return Inertia::render("Admin/Auth/Login");
        }
  
    }
    public function login(Request $request)
    {
        $data=$request->validate([
             "identify"=>["required","string"],
             "password"=>["required","string"],
        ]);
        $request->session()->put('identify',$data["identify"]); 
        $request->session()->put('password',$data["password"]);

        return redirect()->route("admin.dashboard");
    }

    /* logout */
    public function logout(Request $request)
    { 
        
        $request->session()->forget("identify");
        $request->session()->forget("password");
        return redirect()->route("admin.index");
    
    }
    public function dashboard(Request $request)
    {
        return Inertia::render("Admin/Page/Dashboard");
    }

        /* statistic panel */
    public function statistic(Request $request	)
    {
        $user_count=count(User::all());
        $transfer_count=count(Transfer::all());
        $transfer_progressing_count=count(Transfer::all()->where("status","progressing"));
        $transfer_finished_count=count(Transfer::all()->where("status","finished"));
        $transfer_declined_count=count(Transfer::all()->where("status","declined"));
        return Inertia::render("Admin/Page/Statistic")->with([
        "user_count"=>$user_count,
        "transfer_count"=>$transfer_count,
        "transfer_progressing_count"=>$transfer_progressing_count,
        "transfer_finished_count"=>$transfer_finished_count,
        "transfer_declined_count"=>$transfer_declined_count,

        ]);
    }
        /* recharge  form  */
    public function recharge(Request $request	)
    {
        return Inertia::render("Admin/Page/Recharge");
           
    }
     /* put recharge */
    public function recharge_put(Request $request)
    {
       
        $data=$request->validate([
            "email"=>["required"],
            "amount"=>["required"],
        ]);
        $user=User::where("email",$data["email"])->get();
        $recharge=Recharge::where("user_id",$user[0]["id"])->firstOrFail();
        $recharge["amount"]=$recharge["amount"]+$data["amount"];
        $recharge->save();
        return Inertia::render("Admin/Page/Recharge")->with([
            "success"=>"Compte recharger"
        ]);
           
    }

}
