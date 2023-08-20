<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Presensi;

class HelpController extends Controller
{
    public function dashboard() 
    {
        $cekpresen = Presensi::whereDate('created_at',Carbon::today())->where('users_id','=',Auth()->user()->id)->get();

        return view('dashboard',['presensi' => $cekpresen]);   
    }

    public function ruler()
    {
        
    }
}
