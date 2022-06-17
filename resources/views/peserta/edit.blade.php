@extends('layout.master');
@section('content')
<div class="card">
    @error('usia') 
        <h4 style="text-align:center;color:red;">{{ $message }}</h4>
    @enderror
    <form action="/peserta/{{$getdatadiri->id_peserta}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="inline-2 mt">
            <div class="form-group m-auto w-50">
                <label for="nik">Nik</label><br>
                <input id="nik" type="number" name="nik" value="{{$getdatadiri->nik}}" class="input" required><br>
                @error('nik')
                {{$message}} <br>
                @enderror
            </div><br>
            <div class="form-group w-50 m-auto">
                <label for="awal">Nama awal</label><br>
                <input id="awal" type="text" name="awal" value="{{$getdatadiri->first_name}}" class="input" required><br>
                @error('awal')
                {{$message}} <br>
                @enderror
            </div><br>
        </div>
        <div class="inline-2 mt">

            <div class="form-group w-50 m-auto">
                <label for="akhir">Nama akhir</label><br>
                <input id="akhir" type="text" name="akhir" value="{{$getdatadiri->last_name}}" class="input" required><br>
                @error('akhir')
                {{$message}} <br>
                @enderror
            </div><br>
            <div class="form-group w-50 m-auto">
                <label for="tempat">Tempat Lahir</label><br>
                <input id="tempat" type="text" name="tempat_lahir" value="{{$getdatadiri->tempat_lahir}}" class="input" required><br>
                @error('tempat_lahir')
                {{$message}} <br>
                @enderror
            </div><br>
        </div>
        <div class="inline-2 mt">
            <div class="form-group w-50 m-auto">
                <label for="tanggal">Tanggal lahir</label><br>
                <input id="tangggal" type="date" name="tanggal_lahir" value="{{$getdatadiri->tanggal_lahir}}" class="input" required><br>
                @error('tanggal_lahir')
                {{$message}} <br>
                @enderror
            </div><br>
            <div class="form-group w-50 m-auto">
                <label for="kontak">Kontak</label><br>
                <input id="kontak" type="number" name="kontak" value="{{$getdatadiri->kontak}}" class="input" required><br>
                @error('kontak')
                {{$message}} <br>
                @enderror
            </div><br>
        </div>
        <div class="inline-2 mt">
            
            <div class="form-group w-50 m-auto">
                <label for="gambar">Foto Pendukung</label><br>
                <input id="gambar" type="file" name="foto" class="input-file"><br>
                @error('foto')
                <span class="error">{{$message}}</span>
                @enderror
            </div><br>
            <div class="form-group w-50 m-auto">
                <label for="">vaksin Center</label><br>
                <select name="tempat" class="input">

                    @foreach($gettempat as $data)
                    <option value="{{$data->id_center}}" class="option">{{$data->nama}}</option>
                    @endforeach

                </select>
                @error('center')
                <span class="error">{{$message}}</span>
                @enderror
            </div><br>
        </div>
        <div class="inline-2 mt">
            <div class="form-group w-100 m-auto">
                <label for="alamat">Alamat Rumah</label><br>
                <textarea id="alamat" name="alamat" class="textarea" rows="8">{{$getdatadiri->alamat}}</textarea> <br>
                @error('alamat')
                {{$message}} <br>
                @enderror
            </div><br>
        </div>
        <br>
        <div class="form-group" style="margin-left: 4vh;">
            <button type="submit" class="btn-alif-l">Perbarui data diri</button>
        </div>
    </form>
</div>

@endsection