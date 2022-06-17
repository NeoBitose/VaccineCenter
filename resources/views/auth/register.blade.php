<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('auth_asset/style.css')}}">

</head>

<body>

    <div class="registrasi content-admin">
        @error('usia')
        <h4 style="text-align:center;color:red;">{{ $message }}</h4>
        @enderror
        <div class="card">
            <div class="content-card">
                <form action="/authregistrasi" method="post">

                    @csrf
                    <div class="title-login">
                        <h1>Registrasi Peserta</h1>
                    </div><br>
                    <div class="inline mt">
                        <div class="form-group m-auto w-100">
                            <label for="nik">Nik</label><br>
                            <input id="nik" type="number" name="nik" placeholder="Panjang NIK 16 karakter" class="input" value="{{old('nik')}}" required><br>
                            @error('nik')
                            {{$message}} <br>
                            @enderror
                        </div><br>
                    </div>
                    <div class="inline mt">
                        <div class="form-group w-50 m-auto">
                            <label for="awal">Nama awal</label><br>
                            <input id="awal" type="text" name="awal" placeholder="Isi dengan nama depan anda" class="input" value="{{old('awal')}}" required><br>
                            @error('awal')
                            {{$message}} <br>
                            @enderror
                        </div><br>
                        <div class="form-group w-50 m-auto">
                            <label for="akhir">Nama akhir</label><br>
                            <input id="akhir" type="text" name="akhir" class="input" value="{{old('akhir')}}" placeholder="Isi dengan nama depan anda (kosongkan jika tidak ada)" required><br>
                            @error('akhir')
                            {{$message}} <br>
                            @enderror
                        </div><br>
                    </div>
                    <div class="inline mt">
                        <div class="form-group w-50 m-auto">
                            <label for="tempat">Tempat Lahir</label><br>
                            <input id="tempat" type="text" name="tempat_lahir" value="{{old('tempat_lahir')}}" placeholder="Sebutkan kota atau nama daerah" class="input" required><br>
                            @error('tempat_lahir')
                            {{$message}} <br>
                            @enderror
                        </div><br>
                        <div class="form-group w-50 m-auto">
                            <label for="tanggal">Tanggal lahir</label><br>
                            <input id="tangggal" type="date" name="tanggal_lahir" value="{{old('tanggal_lahir')}}" class="input" required><br>
                            @error('tanggal_lahir')
                            {{$message}} <br>
                            @enderror
                        </div><br>
                    </div>
                    <div class="inline mt">
                        <div class="form-group w-50 m-auto">
                            <label for="pass">Password</label><br>
                            <input id="pass" type="password" name="password" placeholder="minimal 8 karakter" class="input" required><br>
                            @error('password')
                            {{$message}} <br>
                            @enderror
                            <input type="checkbox" onclick="seePass()" class="check"> Lihat Pass
                        </div><br>
                        <div class="form-group w-50 m-auto">
                            <label for="kontak">Kontak</label><br>
                            <input id="kontak" type="number" name="kontak" value="{{old('kontak')}}" placeholder="kontak berisis minima 11 karakter" class="input" required><br>
                            @error('kontak')
                            {{$message}} <br>
                            @enderror
                        </div><br>
                    </div>
                    <div class="inline mt">
                        <div class="form-group w-100 m-auto">
                            <label for="alamat">Alamat Rumah</label><br>
                            <textarea id="alamat" name="alamat" class="textarea" value="{{old('alamat')}}" rows="5">

                            </textarea> <br>
                            @error('alamat')
                            {{$message}} <br>
                            @enderror
                        </div><br>
                    </div>
                    <br>
                    <div class="inline mt">
                        <div class="form-group w-100 m-auto">
                            <button type="submit" class="btn-login ">Registrasi</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
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
</body>

</html>