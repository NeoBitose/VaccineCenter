@extends('layout.master')@extends('layout.master');
@section('content')
<div class="card">
    <form action="/berita" method="post" enctype="multipart/form-data">
        @csrf
        <div class="inline-2">
            <div class="form-group w-50 mr-30 ">
                <label for="">Judul Berita</label><br><br>
                <input type="text" name="judul" class="input" required><br>
                @error('judul')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="gambar">Foto Pendukung</label><br><br>
                <input id="gambar" type="file" name="gambar" class="input-file" required><br>
                @error('gambar')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
        </div><br>
        <div class="inline-2">
            <div class="form-group w-100">
                <label for="deskripsi">Deskripsi Berita</label><br>
                <textarea id="deskripsi" name="deskripsi" class="textarea" rows="8" required></textarea> <br>
                @error('deskripsi')
                {{$message}} <br>
                @enderror
            </div><br>
        </div><br><br>
        <div class="form-group">
            <button class="btn-alif-l" type="submit">Tambah data</button>
        </div>
    </form>
</div>
@endsection