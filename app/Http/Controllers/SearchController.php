<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Recharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $urlLogo=url("storage/img/logo.png");
        $val= $request->validate([
           "search"=>["required"]
        ]);
        $search_val=$val["search"];
         
        // initialize the amount recharge where user create account 
        $recharge_exist=Recharge::where("user_id",Auth::user()->id)->get();
        if (count($recharge_exist)===0) {
            Recharge::create([
                "amount"=>0,
                "user_id"=>Auth::user()->id, 
            ]);
        }
        // end 
      
        
        if ($search_cached=Redis::get("search_ID".$search_val)){
            Redis::expire("search_ID".$search_val,60*60*2);
            $data_transfer = json_decode($search_cached,TRUE);
            return Inertia::render('Search',[
                'urlLogo' => $urlLogo,
                "data_transfer"=>$data_transfer,
            ]);
        } else {
            $data_transfer=DB::table('transfers')
            ->where("status","progressing")
            ->where(function($query) use($search_val){
                $query->Where("country_fixed","like","%".$search_val."%")
                ->orwhere("city_selected","like","%".$search_val."%")
                ->orwhere("amount",$search_val)
                ->orwhere("currency","like","%".$search_val."%");
            })
            ->join('users', 'transfers.user_id', '=', 'users.id')
            ->select("transfers.*","users.name","users.surname")
            ->orderByDesc('transfers.created_at')
            ->get();
            Redis::setex("search_ID".$search_val,60*60*2,$data_transfer);  // set in redis db 
            
        }
      
        
    }
}
