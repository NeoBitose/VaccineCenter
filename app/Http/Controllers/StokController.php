<?php

namespace App\Http\Controllers;

use App\Models\CenterModel;
use Illuminate\Http\Request;
use App\Models\StokModel;
use App\Models\VaksinModel;

class StokController extends Controller
{   

    public function __construct()
    {
        // $this->middleware(['admin', 'admincenter']);

        if (session()->get('role') == 'peserta') {
           return abort(404);
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

            $stok = StokModel::leftjoin('vaksin_center', 'stok_center.center_id', 'vaksin_center.id_center')
                                    ->leftjoin('vaksin', 'stok_center.vaksin_id', 'vaksin.id_vaksin')
                                    ->orderBy('id_stok_center', 'asc')
                                    ->get();

        } elseif (session()->get('role') == 'admincenter') {

            $stok = StokModel::leftjoin('vaksin_center', 'stok_center.center_id', 'vaksin_center.id_center')
                                ->leftjoin('vaksin', 'stok_center.vaksin_id', 'vaksin.id_vaksin')
                                ->where('id_center', session()->get('center'))
                                ->orderBy('id_stok_center', 'asc')
                                ->get();
        }

        return view('stok.index', compact('stok'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session()->get('role') == 'admin') {

            $center = CenterModel::all();

        } elseif (session()->get('role') == 'admincenter') {

            $center = CenterModel::where('id_center', session()->get('center'))->first();

        }

        $vaksin = VaksinModel::all();
        

        return view('stok.add', compact('vaksin', 'center'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StokModel::insert([
            'center_id' => request()->id_center,
            'vaksin_id' => request()->id_brand,
            'stok' => request()->stok,
        ]);

        return redirect('/stok');
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
        if (session()->get('role') == 'admin') {

            $stok = StokModel::leftjoin('vaksin_center', 'stok_center.center_id', 'vaksin_center.id_center')
            ->leftjoin('vaksin', 'stok_center.vaksin_id', 'vaksin.id_vaksin')
            ->where('id_stok_center', $id)
            ->first();

            $center = CenterModel::all();

        } 
        
        else if (session()->get('role') == 'admincenter') {

            $stok = StokModel::leftjoin('vaksin_center', 'stok_center.center_id', 'vaksin_center.id_center')
            ->leftjoin('vaksin', 'stok_center.vaksin_id', 'vaksin.id_vaksin')
            ->where('id_center', session()->get('center'))
            ->where('id_stok_center', $id)
            ->first();

            $center = CenterModel::where('id_center', session()->get('center'))->get();

        }

        $vaksin = VaksinModel::all();

        return view('stok.edit', compact('stok', 'vaksin', 'center'));
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
        if (session()->get('role') == 'admin') {
            StokModel::where('id_stok_center', $id)->update([
                'center_id' => request()->id_center,
                'vaksin_id' => request()->id_brand,
                'stok' => request()->stok,
            ]);
        }
        else if (session()->get('role') == 'admincenter') {
            StokModel::where('id_stok_center', $id)->update([
                'center_id' => session()->get('center'),
                'vaksin_id' => request()->id_brand,
                'stok' => request()->stok,
            ]);
        }
        

        return redirect('/stok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        StokModel::where('id_stok_center', $id)->delete();
        return redirect('/stok');
    }
}
