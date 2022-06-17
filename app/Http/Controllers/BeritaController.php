<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BeritaModel as Berita;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index');
        
        // $this->middleware('peserta');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $berita = Berita::all();
        return view('berita.index', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.add');
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
            'gambar' => 'mimes:jpg,bmp,png,jpeg,svg'
        ], [
            'gambar.mimes' => 'format file salah'
        ]);

        $gambar = Request()->gambar;
        $namagambar = $gambar->hashName();
        $gambar->move(public_path('asset/image'), $namagambar);

        Berita::insert([
            'judul' => request()->judul,
            'deskripsi' => request()->deskripsi,
            'gambar' => $namagambar,
            'date' => date('Y-m-d'),
        ]);

        return redirect('/berita');
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
        $berita = Berita::where('id_berita', $id)->first();
        return view('berita.edit', compact('berita'));
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
        if (request()->gambar != "") {

            $databerita = Berita::where('id_berita', $id)->first();
            unlink(public_path('asset/image/' . $databerita->gambar));

            request()->validate([
                'gambar' => 'mimes:jpg,bmp,png,jpeg,svg'
            ], [
                'gambar.mimes' => 'format file tidak benar'
            ]);

            $gambar = Request()->gambar;
            $namagambar = Str::random(10) . '.' . $gambar->extension();
            $gambar->move(public_path('asset/image'), $namagambar);

            Berita::where('id_berita', $id)->update([
                'judul' => request()->judul,
                'deskripsi' => request()->deskripsi,
                'gambar' => $namagambar,
                'date' => date('Y-m-d'),
            ]);

            return redirect('/berita');
        } else { 

            Berita::where('id_berita', $id)->update([
                'judul' => request()->judul,
                'deskripsi' => request()->deskripsi,
                'date' => date('Y-m-d'),
            ]);

            return redirect('/berita');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $databerita = Berita::where('id_berita', $id)->first();
        unlink(public_path('asset/image/' . $databerita->gambar));

        Berita::where('id_berita', $id)->delete();
        return redirect('/berita');
    }
}
