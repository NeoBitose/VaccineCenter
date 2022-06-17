@extends('layout.master');
@section('content')
<div class="card">
    @if(session()->get('role') == 'admin')
    <div class="top-button">
        <a href="/vaksincenter/create"><button class="btn-alif">Tambah</button></a>
    </div>

    <table class="table" cellspacing="0">
        <tr>
            <th>Nama Tempat</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Aksi</th>

        </tr>
        @foreach($getcenter as $row)
        <tr>
            <td>{{$row->nama}}</td>
            <td>{{$row->alamat_center}}</td>
            <td>+62{{$row->kontak_center}}</td>
            <td class="">
                <div class="button-group inline-2">
                    <a href="/vaksincenter/{{$row->id_center}}/edit"><button class="btn-alif">Ubah</button></a>
                    <form action="/vaksincenter/{{$row->id_center}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-alif">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

    @if(session()->get('role') == 'admincenter')

    <table class="table" cellspacing="0">
        <tr>
            <th>Nama Tempat</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Aksi</th>

        </tr>
        @foreach($getcenter as $row)
        <tr>
            <td>{{$row->nama}}</td>
            <td>{{$row->alamat_center}}</td>
            <td>+62{{$row->kontak_center}}</td>
            <td class="">
                <div class="button-group inline-2">
                    <a href="/vaksincenter/{{$row->id_center}}/edit"><button class="btn-alif">Ubah</button></a>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

    @if(session()->get('role') == 'peserta') {

    <table class="table" cellspacing="0">
        <tr>
            <th>Nama Tempat</th>
            <th>Alamat</th>
            <th>Kontak</th>


        </tr>
        @foreach($getcenter as $row)
        <tr>
            <td>{{$row->nama}}</td>
            <td>{{$row->alamat_center}}</td>
            <td>+62{{$row->kontak_center}}</td>

        </tr>
        @endforeach
    </table>
    @endif
</div>
@endsection