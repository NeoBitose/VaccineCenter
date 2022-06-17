@extends('layout.master');
@section('content')
<div class="card">
    <form action="/berita/{{$berita->id_berita}}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="inline-2">
            <div class="form-group w-50 mr-30 ">
                <label for="">Judul Berita</label><br>
                <input type="text" name="judul" class="input" value="{{$berita->judul}}" required><br>
                @error('judul')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="gambar">Foto Pendukung</label><br>
                <input id="gambar" type="file" name="gambar" class="input-file"><br>
                @error('gambar')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
        </div><br>
        <div class="inline-2">
            <div class="form-group w-100">
                <label for="deskripsi">Deskripsi Berita</label><br>
                <textarea id="deskripsi" name="deskripsi" class="textarea" rows="8" required>{{$berita->deskripsi}}</textarea> <br>
                @error('deskripsi')
                {{$message}} <br>
                @enderror
            </div><br>
        </div><br><br>
        <div class="form-group">
            <button class="btn-alif-l" type="submit">Ubah data</button>
        </div>
    </form>
</div>
@endsection