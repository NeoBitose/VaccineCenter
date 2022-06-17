@extends('layout.master');
@section('content')
<div class="card">
    <form action="/admincenter" method="post">
        @csrf
        <div class="inline-2">
            <div class="form-group w-50 mr-30 ">
                <label for="">Nama Awal</label><br>
                <input type="text" name="awal" class="input" placeholder="Isi dengan nama depan admin" required><br>
                @error('awal')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="">Nama Akhir</label><br>
                <input type="text" name="akhir" class="input" placeholder="Isi dengan nama depan admin (kosongkan jika tidak ada)" required><br>
                @error('akhir')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
        </div><br><br>
        <div class="inline-2">
            <div class="form-group w-50 mr-30 ">
                <label for="">Username Login</label><br>
                <input type="text" name="username" class="input" placeholder="username admin" required><br>
                @error('username')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="">Password Login </label><br>
                <input id="pass" type="password" name="password" placeholder="minimal 8 karakter" minlength="8" class="input" required><br>
                @error('password')
                <span class="error">{{$message}}</span>
                @enderror
                <input type="checkbox" onclick="seePass()" class="check"> Lihat Pass
            </div>
        </div><br>
        <div class="inline-2 ">
            <div class="form-group w-50">
                <label for="">vaksin Center</label><br>
                <select name="center" class="input">

                    @foreach($datacenter as $data)
                    <option value="{{$data->id_center}}" class="option">{{$data->nama}}</option>
                    @endforeach

                </select>
                @error('center')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
        </div><br><br>
        <div class="form-group">
            <button class="btn-alif-l" type="submit">Tambah data</button>
        </div>
    </form>
</div>

<script>
    function seePass() {
        var pass = document.getElementById("pass");
        if (pass.type === "password") {
            pass.type = "text";
        } else {
            pass.type = "password";
        }
    }
</script>
@endsection