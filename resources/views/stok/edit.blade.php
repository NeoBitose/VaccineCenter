@extends('layout.master');
@section('content')
<div class="card">
    <form action="/stok/{{$stok->id_stok_center}}" method="post">
        @method('PUT')
        @csrf
        <div class="inline-2">
            <div class="form-group w-50 mr-30">
                <label for="">Nama Vaksin</label><br><br>
                <select name="id_brand" class="input">
                    <option value="{{$stok->vaksin_id}}">{{$stok->brand}}</option>
                    @foreach($vaksin as $data)
                    <option value="{{$data->id_vaksin}}" class="option">{{$data->brand}}</option>
                    @endforeach
                </select>

                @error('id_brand')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="">vaksin Center</label><br><br>
                <select name="id_center" class="input">
                    <option value="{{$stok->center_id}}">{{$stok->nama}}</option>
                    @foreach($center as $data)
                    <option value="{{$data->id_center}}" class="option">{{$data->nama}}</option>
                    @endforeach

                </select>
                @error('center')
                <span class="error">{{$message}}</span>
                @enderror
            </div>

        </div><br>
        <div class="inline-2">
            <div class="form-group w-50  ">
                <label for="">Stok Vaksin</label><br><br>
                <input type="number" name="stok" class="input" value="{{$stok->stok}}" required><br>
                @error('stok')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
        </div><br>


        <div class="form-group">
            <button class="btn-alif-l" type="submit">Ubah data</button>
        </div>
    </form>
</div>
@endsection