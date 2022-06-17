@extends('layout.master');
@section('content')
<div class="card">
    <div class="top-button">
        <a href="/admincenter/create"><button class="btn-alif">Tambah</button></a>

    </div>
    <table class="table" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama</th>
            <th>Vaksin Center</th>
            <th>Aksi</th>
        </tr>
        @foreach($admincenter as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->username}}</td>
            <td>{{$row->first_name}} {{$row->last_name}}</td>
            <td>{{$row->nama}}</td>
            <td class="">
                <div class="button-group inline-2">
                    <a href="/admincenter/{{$row->id_user_center}}/edit"><button class="btn-alif">Ubah</button></a>
                    <form action="/admincenter/{{$row->id_user_center}}" method="post">
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
@endsection