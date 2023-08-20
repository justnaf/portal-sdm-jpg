<?php

namespace App\Http\Controllers;

use App\Models\Presensi;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PresensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cekpresen = Presensi::whereDate('created_at',Carbon::today())->where('users_id','=',Auth()->user()->id)->get();

        return view('presensi.index',['presensi'=>$cekpresen]);   
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->status == 'izin') {
            $cekdatang = Presensi::whereDate('created_at',Carbon::today())->where('users_id','=',Auth()->user()->id)->where('status','=','izin')->get()->isEmpty();
            if ($cekdatang == true) {
                $cekpresen = Presensi::whereDate('created_at',Carbon::today())->where('users_id','=',Auth()->user()->id)->where('status','=','datang')->get()->isEmpty();
                if ($cekpresen == false) {
                    return redirect()->route('presensi.index')->with('warning','Presensi Izin Tidak Dapat Dilakukan Hari Ini');
                }
                else{
                    $presensi = new Presensi;
                    $presensi->users_id = Auth()->user()->id;
                    $presensi->status = $request->status;
                    $presensi->latitude = $request->latitude;
                    $presensi->longitude = $request->longitude;
        
            
                    $savePresensi = $presensi->save();
                    
                    if ($savePresensi == true) {
                        return redirect()->route('presensi.index')->with('success','Presensi '.$request->status.' Hari Ini Berhasil Dilakukan');
                    }
                    else
                    {
                        return redirect()->route('presensi.index')->with('error','Presensi Gagal Dilakukan Ada Kesalahan Pada Sistem');
                    }
                }
            }
            else{
                return redirect()->route('presensi.index')->with('warning','Kamu Sudah Menginputkan Izin Hari Ini');
            }
        }
        elseif($request->status == 'pulang')
        {
            $cekizin = Presensi::whereDate('created_at',Carbon::today())->where('users_id','=',Auth()->user()->id)->where('status','=','izin')->get()->isEmpty();
            if ($cekizin == false) {
                return redirect()->route('presensi.index')->with('warning','Kamu Sudah Izin Hari Ini');
            }
            else
            {
                $cekdatang = Presensi::whereDate('created_at',Carbon::today())->where('users_id','=',Auth()->user()->id)->where('status','=','datang')->get()->isEmpty();
                if($cekdatang == true){
                    return redirect()->route('presensi.index')->with('warning','Presensi Datang Belum Dilakukan Hari Ini');
                }
                else
                {
                    $cekpresen = Presensi::whereDate('created_at',Carbon::today())->where('users_id','=',Auth()->user()->id)->where('status','=',$request->status)->get()->isEmpty();
                    if ($cekpresen == false) {
                        return redirect()->route('presensi.index')->with('warning','Presensi '.$request->status.' Telah Dilakukan Hari Ini');
                    }
                    else{
                        $presensi = new Presensi;
                        $presensi->users_id = Auth()->user()->id;
                        $presensi->status = $request->status;
                        $presensi->latitude = $request->latitude;
                        $presensi->longitude = $request->longitude;
            
                
                        $savePresensi = $presensi->save();
                        
                        if ($savePresensi == true) {
                            return redirect()->route('presensi.index')->with('success','Presensi '.$request->status.' Hari Ini Berhasil Dilakukan');
                        }
                        else
                        {
                            return redirect()->route('presensi.index')->with('error','Presensi Gagal Dilakukan Ada Kesalahan Pada Sistem');
                        }
                    }
                }
            }
        }
        else
        {
            $cekizin = Presensi::whereDate('created_at',Carbon::today())->where('users_id','=',Auth()->user()->id)->where('status','=','izin')->get()->isEmpty();
            if ($cekizin == false) {
                return redirect()->route('presensi.index')->with('warning','Kamu Sudah Izin Hari Ini');
            }
            else
            {
                $cekpresen = Presensi::whereDate('created_at',Carbon::today())->where('users_id','=',Auth()->user()->id)->where('status','=',$request->status)->get()->isEmpty();
                if ($cekpresen == false) {
                    return redirect()->route('presensi.index')->with('warning','Presensi '.$request->status.' Telah Dilakukan Hari Ini');
                }
                else{
                    $presensi = new Presensi;
                    $presensi->users_id = Auth()->user()->id;
                    $presensi->status = $request->status;
                    $presensi->latitude = $request->latitude;
                    $presensi->longitude = $request->longitude;
        
            
                    $savePresensi = $presensi->save();
                    
                    if ($savePresensi == true) {
                        return redirect()->route('presensi.index')->with('success','Presensi '.$request->status.' Hari Ini Berhasil Dilakukan');
                    }
                    else
                    {
                        return redirect()->route('presensi.index')->with('error','Presensi Gagal Dilakukan Ada Kesalahan Pada Sistem');
                    }
                }
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Presensi $presensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Presensi $presensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Presensi $presensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Presensi $presensi)
    {
        //
    }
}
