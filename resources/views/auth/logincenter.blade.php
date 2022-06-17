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

    <div class="login content-admin">
        @error('msg')
        <div class="error-msg">
            <p>{{$message}}</p>
        </div><br>
        @enderror
        <div class="card">
            <div class="content-card">
                <form action="/authcenter" method="post">
                    @csrf
                    <div class="title-login">
                        <h1>Login Center</h1>
                    </div><br>
                    <div class="form-group mt">
                        <label for="">Username</label><br>
                        <input type="text" name="username" class="input" value="{{old('username')}}" required>
                    </div><br>
                    <div class="form-group">
                        <label for="">Password</label><br>
                        <input id="pass" type="password" name="password" class="input" required><br>
                        @error('password')
                        <span class="error"> {{$message}} </span><br>
                        @enderror
                        <input type="checkbox" onclick="seePass()" class="check"> Lihat Pass
                    </div><br>
                    <div class="form-group">
                        <button type="submit" class="btn-login">Login</button>
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