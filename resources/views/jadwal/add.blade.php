@extends('layout.master');
@section('content')
<div class="card">
    <form action="/jadwal" method="post">
        @csrf
        <div class="inline-2">
            <div class="form-group w-50 mr-30">
                <label for="">vaksin Center</label><br>
                <select name="center" class="input">

                    @foreach($center as $data)
                    <option value="{{$data->id_center}}" class="option">{{$data->nama}}</option>
                    @endforeach

                </select>
                @error('center')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group w-50 ">
                <label for="">Tempat Pelaksanaan</label><br>
                <input type="text" name="tempat" class="input" required><br>
                @error('tempat')
                <span class="error">{{$message}}</span>
                @enderror
            </div>

        </div><br>
        <div class="inline-2">
            <div class="form-group w-50 mr-30">
                <label for="detail">Waktu</label><br>
                <input type="time" name="waktu" class="input" required><br>
                @error('waktu')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group w-50 ">
                <label for="">Tanggal Pelaksanan</label><br>
                <input type="date" name="tanggal" class="input" required><br>
                @error('tanggal')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <br>
        </div><br><br>
        <div class="form-group">
            <button class="btn-alif-l" type="submit">Tambah data</button>
        </div>
    </form>
</div>
@endsection