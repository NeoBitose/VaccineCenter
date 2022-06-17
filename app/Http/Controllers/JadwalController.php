<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalModel;
use App\Models\CenterModel;

class JadwalController extends Controller
{
    public function __construct()
    {
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->get('role') == 'admin') {

            $jadwal = JadwalModel::join('vaksin_center', 'jadwal_vaksin.center_id', 'vaksin_center.id_center')
                                    ->orderBy('tanggal', 'asc')->get();
            return view('jadwal.index', compact('jadwal'));
        } 
        else if (session()->get('role') == 'admincenter') {

            $jadwal = JadwalModel::join('vaksin_center', 'jadwal_vaksin.center_id', 'vaksin_center.id_center')
                                    ->where('id_center', session()->get('center'))
                                    ->orderBy('tanggal', 'asc')->get();
            return view('jadwal.index', compact('jadwal'));
        } 
        else if (session()->get('role') == 'peserta') {

            $jadwal = JadwalModel::join('vaksin_center', 'jadwal_vaksin.center_id', 'vaksin_center.id_center')
            ->orderBy('tanggal', 'asc')->get();
            return view('jadwal.index', compact('jadwal'));
        } 
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->get('role') == 'admincenter') {

            $center = CenterModel::where('id_center', session()->get('center'))->get();
            return view('jadwal.add', compact('center'));
        }
        else{

            $center = CenterModel::all();
            return view('jadwal.add', compact('center'));
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        JadwalModel::insert([
            'center_id' => request()->center,
            'tanggal' => request()->tanggal,
            'waktu' => request()->waktu,
            'tempat' =>request()->tempat,
        ]);

        return redirect('/jadwal');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jadwal = JadwalModel::join('vaksin_center', 'jadwal_vaksin.center_id', 'vaksin_center.id_center')->where('id_jadwal', $id)->first();
        $center = CenterModel::all();

        return view('jadwal.edit', compact('jadwal', 'center'));
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        JadwalModel::where('id_jadwal', $id)->update([
            'center_id' => request()->center,
            'tanggal' => request()->tanggal,
            'waktu' => request()->waktu,
            'tempat' => request()->tempat,
        ]);

        return redirect('/jadwal');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = JadwalModel::where('id_jadwal', $id)->first();
        
        if (strtotime($jadwal->tanggal) < strtotime(date('Y-m-d'))) {

            return redirect('/jadwal')->withErrors(['pesan' => 'jadwal tidak bisa dihapus']);

        } else {

            JadwalModel::where('id_jadwal', $id)->delete();
            return redirect('/jadwal');
        }
        
    }
}
