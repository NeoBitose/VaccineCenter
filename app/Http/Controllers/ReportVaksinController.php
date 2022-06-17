<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportvModel;
use App\Models\PesertaModel;
use App\Models\CenterModel;
use App\Models\JadwalModel;
use App\Models\StatusModel;
use App\Models\StokModel;
use App\Models\VaksinModel;

class ReportVaksinController extends Controller
{
    public function __construct()
    {
        if (session()->get('role') == 'peserta') {
            abort(404);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session()->get('role') == 'admin') {

            $report = ReportvModel::leftjoin('peserta', 'report_vaksin.peserta_id', 'peserta.id_peserta')
                                    ->leftjoin('jadwal_vaksin', 'report_vaksin.jadwal_id', 'jadwal_vaksin.id_jadwal')                                    
                                    ->leftjoin('vaksin', 'report_vaksin.vaksin_id', 'vaksin.id_vaksin')
                                    ->leftjoin('vac_status', 'report_vaksin.vac_status_id', 'vac_status.id_vac_status')
                                    ->leftjoin('vaksin_center', 'jadwal_vaksin.center_id', 'vaksin_center.id_center')
                                    ->get();

        } else if (session()->get('role') == 'admincenter') {

            $report = ReportvModel::leftjoin('peserta', 'report_vaksin.peserta_id', 'peserta.id_peserta')
                                    ->leftjoin('jadwal_vaksin', 'report_vaksin.jadwal_id', 'jadwal_vaksin.id_jadwal')                                    
                                    ->leftjoin('vaksin', 'report_vaksin.vaksin_id', 'vaksin.id_vaksin')
                                    ->leftjoin('vac_status', 'report_vaksin.vac_status_id', 'vac_status.id_vac_status')
                                    ->leftjoin('vaksin_center', 'jadwal_vaksin.center_id', 'vaksin_center.id_center')
                                    ->where('center_id', session()->get('center'))
                                    ->get();

        } else if (session()->get('role') == 'peserta') {

            $report = ReportvModel::leftjoin('peserta', 'report_vaksin.peserta_id', 'peserta.id_peserta')
                                    ->leftjoin('jadwal_vaksin', 'report_vaksin.jadwal_id', 'jadwal_vaksin.id_jadwal')
                                    ->leftjoin('vaksin', 'report_vaksin.vaksin_id', 'vaksin.id_vaksin')
                                    ->leftjoin('vac_status', 'report_vaksin.vac_status_id', 'vac_status.id_vac_status')
                                    ->leftjoin('vaksin_center', 'jadwal_vaksin.center_id', 'vaksin_center.id_center')
                                    ->where('id_peserta', session()->get('id_peserta'))
                                    ->get();
        }

        return view('report.index', compact('report'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add($id){

        $jadwal = JadwalModel::join('vaksin_center', 'jadwal_vaksin.center_id', 'vaksin_center.id_center')->where('id_jadwal', $id)->first();
        $peserta = PesertaModel::where('center_id', $jadwal->center_id)->get();
        $vaksin = StokModel::join('vaksin', 'stok_center.vaksin_id', 'vaksin.id_vaksin')->where('center_id', $jadwal->center_id)->get();
        
        return view('report.add', compact('jadwal', 'peserta', 'vaksin'));
    }

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = ReportvModel::where('jadwal_id', request()->id_jadwal)->get();
        $peserta = PesertaModel::where('id_peserta', request()->id_peserta)->first(); 
        $status = StatusModel::all();

        // dd(StatusModel::where('status', 'dosis pertama')->first('id_vac_status'));

        $stok = StokModel::where('center_id', request()->id_center)->where('vaksin_id', request()->id_vaksin)->first();
        // dd($stok->stok);

        for($a = 0; $a < count($report); $a++){
            if(request()->id_peserta == $report[$a]->peserta_id){
                return redirect()->back()->withErrors(['peserta' => 'peserta sudah vaksin sesuai jadwal']);
            }
        }

        if ($peserta->vac_status_id == 1) {
            
            ReportvModel::insert([
                'jadwal_id' => request()->id_jadwal,
                'peserta_id' => request()->id_peserta,
                'vaksin_id' => request()->id_vaksin,
                'vac_status_id' => 2,
            ]);

            PesertaModel::where('id_peserta', request()->id_peserta)->update(['vac_status_id' => 2,]);

        } else if ($peserta->vac_status_id == 2){

            ReportvModel::insert([
                'jadwal_id' => request()->id_jadwal,
                'peserta_id' => request()->id_peserta,
                'vaksin_id' => request()->id_vaksin,
                'vac_status_id' => 3,
            ]);

            PesertaModel::where('id_peserta', request()->id_peserta)->update(['vac_status_id' => 3,]);
            
        } else if ($peserta->vac_status_id == 3){

            return redirect()->back()->withErrors(['peserta' => 'peserta sudah vaksin 2 kali']);
            
        } else if ($peserta->vac_status_id == 4){

            ReportvModel::insert([
                'jadwal_id' => request()->id_jadwal,
                'peserta_id' => request()->id_peserta,
                'vaksin_id' => request()->id_vaksin,
                'vac_status_id' => 2,
            ]);   

            PesertaModel::where('id_peserta', request()->id_peserta)->update(['vac_status_id' => 2,]);
        }

        StokModel::where('vaksin_id', request()->id_vaksin)->update([
            'stok' => $stok->stok - 1
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
