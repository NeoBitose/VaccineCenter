<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VaksinModel;
use App\Models\StokModel;

class VaksinController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vaksin = VaksinModel::all();
        return view('vaksin.index', compact('vaksin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaksin.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'brand' => 'unique:vaksin'
        ], [
            'brand.unique' => 'vaksin sudah ada'
        ]);

        VaksinModel::insert([
            'brand' => request()->brand,
            'detail' => request()->detail,
        ]);

        return redirect('/vaksin');
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
        $vaksin = VaksinModel::where('id_vaksin', $id)->first();
        return view('vaksin.edit', compact('vaksin'));
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
        $vaksin = VaksinModel::where('id_vaksin', $id)->first();

        if (request()->brand != $vaksin->brand) {
            request()->validate([
                'brand' => 'unique:vaksin'
            ], [
                'brand.unique' => 'vaksin sudah ada'
            ]);
        }
        VaksinModel::where('id_vaksin', $id)->update([
            'brand' => request()->brand,
            'detail' => request()->detail,
        ]);

        return redirect('/vaksin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vaksin = VaksinModel::where('id_vaksin', $id)->first();
        VaksinModel::where('id_vaksin', $id)->update(['status_vaksin' => 'nonaktif']);
        StokModel::where('vaksin_id', $vaksin->id_vaksin)->update(['stok' => 0]);

    }
}
