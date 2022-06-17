@extends('layout.master');
@section('content')
<div class="card">
    @if(session()->get('role') != 'peserta')
    <div class="top-button">
        <a href="/jadwal/create"><button class="btn-alif">Tambah</button></a>
    </div>

    @if(session()->get('role') == 'admin')
    <table class="table" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Penyelenggara</th>
            <th>Nama Tempat</th>
            <th>tanggal</th>
            <th>Jam</th>
            <th>Aksi</th>
            <th>Report</th>

        </tr>
        @foreach($jadwal as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->nama}}</td>
            <td>{{$row->tempat}}</td>
            <td>{{$row->tanggal}}</td>
            <td>{{$row->waktu}}</td>
            <td class="">
                <div class="button-group inline-2">
                    <a href="/jadwal/{{$row->id_jadwal}}/edit"><button class="btn-alif">Ubah</button></a>
                    <form action="/jadwal/{{$row->id_jadwal}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-alif">Hapus</button>
                    </form>
                </div>
            </td>
            <td>
                <div class="button-group inline-2">
                    @if(date('Y-m-d') >= $row->tanggal)
                    <a href="/addreportv/{{$row->id_jadwal}}">
                        <button class="btn-alif">Report</button>
                    </a>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif
    @if(session()->get('role') == 'admincenter')
    <table class="table" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Tempat</th>
            <th>tanggal</th>
            <th>Jam</th>
            <th>Aksi</th>
            <th>Report</th>

        </tr>
        @foreach($jadwal as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->tempat}}</td>
            <td>{{$row->tanggal}}</td>
            <td>{{$row->waktu}}</td>
            <td class="">
                <div class="button-group inline-2">
                    <a href="/jadwal/{{$row->id_jadwal}}/edit"><button class="btn-alif">Ubah</button></a>
                    <form action="/jadwal/{{$row->id_jadwal}}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn-alif">Hapus</button>
                    </form>
                </div>
            </td>
            <td>
                <div class="button-group inline-2">
                    @if(date('Y-m-d') == $row->tanggal)
                    <a href="/jadwal/{{$row->id_jadwal}}/edit"><button class="btn-alif">Report</button></a>
                    @endif
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

    @endif

    @if(session()->get('role') == 'peserta')
    <div class="top-button">
        <a href="/jadwal/create"><button class="btn-alif">Tambah</button></a>
    </div>


    <table class="table" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Tempat</th>
            <th>tanggal</th>
            <th>Jam</th>

        </tr>
        @foreach($jadwal as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->nama}}</td>
            <td>{{$row->tanggal}}</td>
            <td>{{$row->waktu}}</td>
        </tr>
        @endforeach
    </table>
    @endif
</div>
@endsection