@extends('layout.master');
@section('content')
<div class="card">
    <form action="/admincenter/{{$dataadmin->id_user_center}}" method="post">
        @method('PUT')
        @csrf
        <div class="inline-2">
            <div class="form-group w-50 mr-30 ">
                <label for="">Nama Awal</label><br>
                <input type="text" name="awal" value="{{$dataadmin->first_name}}" class="input" required><br>
                @error('awal')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
            <div class="form-group w-50">
                <label for="">Nama Akhir</label><br>
                <input type="text" name="akhir" class="input" value="{{$dataadmin->last_name}}" required><br>
                @error('akhir')
                <span class="error">{{$message}}</span>
                @enderror
            </div>
        </div><br><br>
        <div class="inline-2">
            <div class="form-group w-50 mr-30 ">
                <label for="">Username Login</label><br>
                <input type="text" name="username" value="{{$dataadmin->username}}" class="input" required><br>
                @error('username')
                <span class="error">{{$message}}</span>
                @enderror
            </div>

            <div class="form-group w-50">
                <label for="">vaksin Center</label><br>
                <select name="center" class="input">
                    <option value="{{$dataadmin->center_id}}">{{$dataadmin->nama}}</option>
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
            <button class="btn-alif-l" type="submit">Edit data</button>
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