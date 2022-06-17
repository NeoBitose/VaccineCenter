@extends('layout.master');
@section('content')
<div class="card">

    @if(session()->get('role') == 'admin')
    <table class="table" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Penyelenggara</th>
            <th>Nama Tempat</th>
            <th>tanggal</th>
            <th>NIK</th>
            <th>Peserta</th>
            <th>Vaksin</th>
            <th>Status Peserta</th>
            <th>cetak vaksinasi</th>

        </tr>
        @foreach($report as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->nama}}</td>
            <td>{{$row->tempat}}</td>
            <td>{{$row->tanggal}}</td>
            <td>{{$row->nik}}</td>
            <td>{{$row->first_name}} {{$row->last_name}}</td>
            <td>{{$row->brand}}</td>
            <td>{{$row->status}}</td>
            <td>
                <div class="button-group inline-2">
                    <a href="/printbukti/{{$row->id_reportv}}">
                        <button class="btn-alif">Cetak Bukti</button>
                    </a>
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
            <th>NIK</th>
            <th>Peserta</th>
            <th>Vaksin</th>
            <th>Status Peserta</th>

        </tr>
        @foreach($jadwal as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->tempat}}</td>
            <td>{{$row->tanggal}}</td>
            <td>{{$row->waktu}}</td>
        </tr>
        @endforeach
    </table>
    @endif

    @if(session()->get('role') == 'peserta')
    <table class="table" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Penyelenggara</th>
            <th>Nama Tempat</th>
            <th>tanggal</th>
            <th>NIK</th>
            <th>Peserta</th>
            <th>Vaksin</th>
            <th>Status Peserta</th>
            <th>cetak vaksinasi</th>

        </tr>
        @foreach($report as $row)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$row->nama}}</td>
            <td>{{$row->tempat}}</td>
            <td>{{$row->tanggal}}</td>
            <td>{{$row->nik}}</td>
            <td>{{$row->first_name}} {{$row->last_name}}</td>
            <td>{{$row->brand}}</td>
            <td>{{$row->status}}</td>
            <td>
                <div class="button-group inline-2">
                    <a href="/printbukti/{{$row->id_reportv}}">
                        <button class="btn-alif">Cetak Bukti</button>
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
    </table>
    @endif

</div>
@endsection