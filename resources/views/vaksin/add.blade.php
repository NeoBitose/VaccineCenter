@extends('layout.master');
@section('content')
<div class="card">
    <form action="/vaksin" method="post">
        @csrf
        <div class="inline-2">
            <div class="form-group w-50 ">
                <label for="">Nama Produk vaksin</label><br><br>
                <input type="text" name="brand" class="input" required><br>
                @error('brand')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
        </div><br>
        <div class="inline-2">
            <div class="form-group w-50">
                <label for="detail">Detail Produk</label><br>
                <textarea id="detail" name="detail" class="textarea" rows="8"></textarea> <br>
                @error('detail')
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