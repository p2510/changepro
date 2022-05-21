<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class WorkingController extends Controller
{
     public function working()
     {
        $urlLogo=url("storage/img/logo.png");
        return Inertia::render("Working")->with([
            'urlLogo' => $urlLogo,
           
        ]);
     }
}
