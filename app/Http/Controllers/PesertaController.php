<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesertaModel;
use App\Models\CenterModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PesertaController extends Controller
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

            $datapeserta = PesertaModel::leftjoin('vac_status', 'peserta.vac_status_id', '=', 'vac_status.id_vac_status')
                ->leftjoin('vaksin_center', 'peserta.center_id', 'vaksin_center.id_center')
                ->get();
        } else if (session()->get('role') == 'admincenter') {

            $datapeserta = PesertaModel::leftjoin('vac_status', 'peserta.vac_status_id', '=', 'vac_status.id_vac_status')
                ->leftjoin('vaksin_center', 'peserta.center_id', 'vaksin_center.id_center')
                ->where('id_center', session()->get('center'))
                ->get();
        } else if (session()->get('role') == 'peserta') {

            $datapeserta = PesertaModel::leftjoin('vac_status', 'peserta.vac_status_id', '=', 'vac_status.id_vac_status')
                ->leftjoin('vaksin_center', 'peserta.center_id', 'vaksin_center.id_center')
                ->where('id_peserta', session()->get('id_peserta'))
                ->get();
        }

        // dd($gettempat);
        return view('peserta.index', compact('datapeserta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($nik)
    {
        $peserta = PesertaModel::join('vac_status', 'peserta.vac_status_id', '=', 'vac_status.id_vac_status')->where('id_peserta', session()->get('id_peserta'))->first();
        return view('peserta.detail', compact('peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getdatadiri = PesertaModel::join('vac_status', 'peserta.vac_status_id', '=', 'vac_status.id_vac_status')->where('id_peserta', $id)->first();
        $gettempat = CenterModel::all();
        return view('peserta.edit', compact('gettempat', 'getdatadiri'));
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
        $umur = Carbon::parse(request()->tanggal_lahir)->age;

        if ($umur < 6) {
            return redirect()->back()->withErrors(['usia' => 'Usia tidak mencukupi']);
        }

        $nik_psrt = PesertaModel::where('id_peserta', $id)->first();

        if (request()->nik == $nik_psrt->nik) {

            request()->validate([

                'nik' => '|min:16|max:16',
                'kontak' => 'min:11',
            ], [
                'nik.max' => 'NIK harus 16 karakter',
                'nik.min' => 'NIK harus 16 karakter',
                'kontak.min' => 'Nomor Minimal 11',
            ]);

        } else {

            request()->validate([
                'nik' => 'unique:peserta|min:16|max:16',
                'kontak' => 'min:11',
            ], [
                'nik.unique' => 'NIK sudah digunakan',
                'nik.max' => 'NIK harus 16 karakter',
                'nik.min' => 'NIK harus 16 karakter',
                'kontak.min' => 'Nomor Minimal 11',
            ]);
        }

        if (request()->foto != "") {

            $peserta = PesertaModel::where('id_peserta', $id)->first();

            request()->validate([
                'foto' => 'mimes:jpg,bmp,png,jpeg,svg',
            ], [
                'foto.mimes' => 'format file salah'
            ]);

            if ($peserta->foto_peserta != 'default.jpg') {

                unlink(public_path('asset/image/' . $peserta->foto_peserta));
            }

            $foto = request()->foto;
            $nama_foto = $foto->hashName();
            $foto->move(public_path('asset/image'), $nama_foto);

            PesertaModel::where('id_peserta', $id)->update([
                'first_name' => request()->awal,
                'last_name' => request()->akhir,
                'tanggal_lahir' => request()->tanggal_lahir,
                'tempat_lahir' => request()->tempat_lahir,
                'umur' => $umur,
                'alamat' => request()->alamat,
                'kontak' => request()->kontak,
                'center_id' => request()->tempat,
                'foto_peserta' => $nama_foto,
            ]);

        } else {

            PesertaModel::where('id_peserta', $id)->update([
                'first_name' => request()->awal,
                'last_name' => request()->akhir,
                'tanggal_lahir' => request()->tanggal_lahir,
                'tempat_lahir' => request()->tempat_lahir,
                'umur' => $umur,
                'alamat' => request()->alamat,
                'kontak' => request()->kontak,
                'center_id' => request()->tempat,
            ]);
        }

        return redirect('/peserta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PesertaModel::where('id_peserta', $id)->update([
            'status_peserta' => "nonaktif",
        ]);

        return redirect('/peserta');
    }
}
