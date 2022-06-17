@extends('layout.master');
@section('content')

@if(session()->get('role') == 'admin')
<div class="card">
    <div class="top-button">
        <a href="/vaksin/create"><button class="btn-alif">Tambah</button></a>
    </div>
    <table class="table" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Produk Vaksin</th>
            <th>Detail</th>
            <th>Aksi</th>

        </tr>
        @foreach($vaksin as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->brand}}</td>
            <td>{{$row->detail}}</td>
            <td class="">
                <div class="button-group inline-2">
                    <a href="/vaksin/{{$row->id_vaksin}}/edit"><button class="btn-alif">Ubah</button></a>
                    <form action="/vaksin/{{$row->id_vaksin}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-alif">Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endif

@if(session()->get('role') != 'admin')
<div class="card">
    <table class="table" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Produk Vaksin</th>
            <th>Detail</th>

        </tr>
        @foreach($vaksin as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->brand}}</td>
            <td>{{$row->detail}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif

@endsection