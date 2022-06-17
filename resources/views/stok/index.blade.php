@extends('layout.master');
@section('content')
<div class="card">
    <div class="top-button">
        <a href="/stok/create"><button class="btn-alif">Tambah</button></a>
    </div>
    @if(session()->get('role') == 'admincenter')
    <table class="table" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama vaksin</th>
            <th>Jumlah Stok</th>
            <th>Aksi</th>
        </tr>
        @foreach($stok as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->brand}}</td>
            <td>{{$row->stok}}</td>
            <td class="">
                <div class="button-group inline-2">
                    <a href="/stok/{{$row->id_stok_center}}/edit"><button class="btn-alif">Ubah</button></a>
                    <form action="/stok/{{$row->id_stok_center}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-alif">Kosongkan</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

    @if(session()->get('role') == 'admin')
    <table class="table" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Vaksin Center</th>
            <th>Nama vaksin</th>
            <th>Jumlah Stok</th>
            <th>Aksi</th>
        </tr>
        @foreach($stok as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->nama}}</td>
            <td>{{$row->brand}}</td>
            <td>{{$row->stok}}</td>
            <td class="">
                <div class="button-group inline-2">
                    <a href="/stok/{{$row->id_stok_center}}/edit"><button class="btn-alif">Ubah</button></a>
                    <form action="/stok/{{$row->id_stok_center}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-alif">Kosongkan</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

</div>
@endsection