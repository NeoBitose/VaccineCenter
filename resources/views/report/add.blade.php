@extends('layout.master');
@section('content')
<div class="card">
    @error('peserta')
        {{$message}}
    @enderror
    <form action="/reportv" method="post">
        @csrf
        <div class="inline-2">
            <div class="form-group w-50 mr-30">
                <label for="">vaksin Center</label><br>
                <input type="text" name="center" class="input" value="{{$jadwal->nama}}" readonly>
                
                @error('center')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group w-50 ">
                <label for="">Tempat Pelaksanaan</label><br>
                <input type="text" name="tempat" class="input" value="{{$jadwal->tempat}}" readonly><br>
                @error('tempat')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <br>
        </div><br>
        <input type="hidden" name="id_jadwal" value="{{$jadwal->id_jadwal}}" id="">
        <input type="hidden" name="id_center" value="{{$jadwal->id_center}}" id="">
        <div class="inline-2">
            <div class="form-group w-50 mr-30">
                <label for="">Nama Vaksin</label><br>
                <select name="id_vaksin" class="input">
                    @foreach($vaksin as $data)
                    <option value="{{$data->id_vaksin}}" class="option">{{$data->brand}}</option>
                    @endforeach
                </select>

                @error('id_')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group w-50 ">
                <label for="akhir">Nama peserta</label><br>
                <select name="id_peserta" class="input">
                    @foreach($peserta as $data)
                    <option value="{{$data->id_peserta}}" class="option">{{$data->first_name}} {{$data->last_name}}</option>
                    @endforeach
                </select><br>
                @error('id_peserta')
                {{$message}} <br>
                @enderror
            </div><br>

        </div><br>
        <br>
        <div class="form-group">
            <button class="btn-alif-l" type="submit">Tambah data</button>
        </div>
    </form>
</div>
@endsection