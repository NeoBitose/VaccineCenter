@extends('layout.master');
@section('content')
<div class="card">
    <form action="/vaksincenter" method="post">
        @csrf
        <div class="inline-2">
            <div class="form-group w-50 mr-30 ">
                <label for="">Nama Penyelenggara Vaksin</label><br><br>
                <input type="text" name="center" class="input" placeholder="Isi dengan nama fasilitas kesehatan misal puskesmas, rumah sakit" required><br>
                @error('center')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="">Kontak</label><br><br>
                <input type="number" name="kontak" class="input" placeholder="minimal 11 karakter" required><br>
                @error('kontak')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
        </div><br>
        <div class="inline-2">
            <div class="form-group w-100">
                <label for="detail">Alamat Penyelenggara vaksin</label><br>
                <textarea id="detail" name="alamat" class="textarea" rows="8"></textarea> <br>
                @error('alamat')
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