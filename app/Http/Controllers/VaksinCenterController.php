<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CenterModel;

class VaksinCenterController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only('create', 'store', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(session()->get('role') == 'admincenter'){
            
            $getcenter = CenterModel::where('id_center', session()->get('center'))->get();
            return view('center.index', compact('getcenter'));
        }

        $getcenter = CenterModel::all();
        return view('center.index', compact('getcenter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('center.add');
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
            'kontak' => 'min:12|max:13'
        ], [
            'kontak.min' => 'Kontak minimal 12 karakter',
            'kontak.max' => 'kontak maksimal 13 karakter'
        ]);

        CenterModel::insert([
            'nama' => request()->center,
            'alamat_center' => request()->alamat,
            'kontak_center' => request()->kontak,
        ]);

        return redirect('/vaksincenter');
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
        if(session()->get('role') == 'peserta'){
            return abort(404);
        }
        $getcenter = CenterModel::where('id_center', $id)->first();
        return view('center.edit', compact('getcenter'));

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
        if(session()->get('role') == 'peserta'){
            return abort(404);
        }

        request()->validate([
            'kontak' => 'min:12|max:13'
        ], [
            'kontak.min' => 'Kontak minimal 12 karakter',
            'kontak.max' => 'kontak maksimal 13 karakter'
        ]);

        CenterModel::where('id_center', $id)->update([
            'nama' => request()->center,
            'alamat_center' => request()->alamat,
            'kontak_center' => request()->kontak,
        ]);
        
        return redirect('/vaksincenter');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CenterModel::where('id_center', $id)->update([        
            'status_center' => 'nonaktif',
        ]);

        return redirect('/vaksincenter');
    }
}
