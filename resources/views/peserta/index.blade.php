@extends('layout.master');
@section('content')
<div class="card">
    <!-- <div class="top-button">
        <a href="/addcenter"><button class="btn-alif">Tambah</button></a>

    </div> -->
    <table class="table" style="border:lightgrey;" cellspacing="0">
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tempat Tanggal Lahir</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>usia</th>
            <th>Vaksin Center</th>
            <th>Status</th>
            <th>Aksi</th>

        </tr>
        @foreach($datapeserta as $row)
        <tr>
            <td>{{$row['nik']}}</td>
            <td>{{$row->first_name}} {{$row->last_name}}</td>
            <td>{{$row->tempat_lahir}}, {{$row->tanggal_lahir}}</td>
            <td>{{$row->alamat}}</td>
            <td>+62{{$row->kontak}}</td>
            <td>{{$row->umur}}</td>
            <td>{{$row->nama}}</td>
            <td>{{$row->status}}</td>
            <td class="">
                @if(session()->get('role') == 'peserta')
                <div class="button-group inline-2">
                    <a href="/peserta/{{$row->id_peserta}}/edit"><button class="btn-alif">Edit</button></a>
                </div>
                @endif
                @if(session()->get('role') == 'admincenter')
                <div class="button-group inline-2">
                    <form action="/peserta/{{$row->id_peserta}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-alif">Hapus</button>
                    </form> 
                </div>
                @endif
                @if(session()->get('role') == 'admin')
                <div class="button-group inline-2">
                    <a href="/peserta/{{$row->id_peserta}}/edit"><button class="btn-alif">Edit</button></a>
                    <form action="/peserta/{{$row->id_peserta}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-alif">Hapus</button>
                    </form>                
                </div>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection