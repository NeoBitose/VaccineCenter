<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\ReportvModel;
use PDF;

class SideController extends Controller
{
    public function back() {
        return Redirect()->back();
    }

    public function print($id) {
        $report = ReportvModel::leftjoin('peserta', 'report_vaksin.peserta_id', 'peserta.id_peserta')
                                ->leftjoin('jadwal_vaksin', 'report_vaksin.jadwal_id', 'jadwal_vaksin.id_jadwal')
                                ->leftjoin('vaksin', 'report_vaksin.vaksin_id', 'vaksin.id_vaksin')
                                ->leftjoin('vac_status', 'report_vaksin.vac_status_id', 'vac_status.id_vac_status')
                                ->leftjoin('vaksin_center', 'jadwal_vaksin.center_id', 'vaksin_center.id_center')
                                ->where('id_reportv', $id)
                                ->first();

        $pdf = PDF::loadView('bukti', ['report' => $report]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->download('bukti_vaksinasi_' . $report->first_name . '_' . $report->last_name . '.pdf');
        // dd($report);
        // return view('bukti', compact('report'));

    }
}
