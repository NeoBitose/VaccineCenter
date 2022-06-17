<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
</head>

<body>
    <div class="brandbar">
        <div class="brand">
            @if (session()->get('role') == 'admin' || session()->get('role') == 'admincenter')
            <h2>Halaman Admin</h2>
            @endif
            @if (session()->get('role') == 'peserta')
            <h2>Halaman Peserta</h2>
            @endif
        </div>
    </div>
    <div class="sidebar">
        <div class="navigation">
            @if (session()->get('role') == 'admin')
            <h3 style="color: black; text-align:center; margin: 20px 0px">{{ session()->get('name') }}</h3>
            <ul>
                <li><a href="/homeadmin">&raquo; &nbsp; Dashboard</a></li>
                <li><a href="/vaksincenter">&raquo; &nbsp; Vaksin center</a></li>
                <li><a href="/admincenter">&raquo; &nbsp;Admin Vaksin center</a></li>
                <li><a href="/peserta">&raquo; &nbsp; Peserta</a></li>
                <li><a href="/vaksin">&raquo; &nbsp; Vaksin</a></li>
                <li><a href="/stok">&raquo; &nbsp; Stok Vaksin</a></li>
                <li><a href="/jadwal">&raquo; &nbsp; Jadwal Vaksin</a></li>
                <li><a href="/reportv">&raquo; &nbsp; Report Vaksin</a></li>
                <li><a href="/berita">&raquo; &nbsp; Berita</a></li>
            </ul>
            @endif
            @if (session()->get('role') == 'admincenter')
            <h3 style="color: black; text-align:center; margin: 20px 0px">{{ session()->get('name') }}</h3>
            <ul>
                <li><a href="/homecenter">&raquo; &nbsp; Dashboard</a></li>
                <li><a href="/vaksincenter">&raquo; &nbsp; Vaksin center</a></li>
                <li><a href="/vaksin">&raquo; &nbsp; Vaksin</a></li>
                <li><a href="/peserta">&raquo; &nbsp; Peserta</a></li>
                <li><a href="/stok">&raquo; &nbsp; Stok Vaksin</a></li>
                <li><a href="/jadwal">&raquo; &nbsp; Jadwal Vaksin</a></li>
                <li><a href="/reportv">&raquo; &nbsp; Report Vaksin</a></li>
                <li><a href="/berita">&raquo; &nbsp;Berita</a></li>
            </ul>
            @endif
            @if (session()->get('role') == 'peserta')
            <h3 style="color: black; text-align:center; margin: 20px 0px">{{ session()->get('name') }}</h3>
            <ul>
                <li><a href="/homepeserta">&raquo; &nbsp; Dashboard</a></li>
                <li><a href="/peserta">&raquo; &nbsp; Data Diri</a></li>
                <li><a href="/vaksincenter">&raquo; &nbsp; Vaksin center</a></li>
                <li><a href="/vaksin">&raquo; &nbsp; Vaksin</a></li>
                <li><a href="/jadwal">&raquo; &nbsp; Jadwal</a></li>
                <li><a href="/reportv">&raquo; &nbsp; Kegiatan Vaksin</a></li>
                <li><a href="/berita">&raquo; &nbsp; Berita</a></li>
            </ul>
            @endif

        </div>

    </div>
    <div class="navbar">
        <div class="content-navbar">
            <div class="left">
                <h4 class="jam"><span id="jam"></span></h4>
            </div>
            <div class="right">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <div class="main">
        @yield('content')
    </div>

    <script type="text/javascript">
        function showTime() {
            // var a_p = "";
            var today = new Date();
            var curr_hour = today.getHours();
            var curr_minute = today.getMinutes();
            var curr_second = today.getSeconds();
            // if (curr_hour < 12) {
            //     a_p = "AM";
            // } else {
            //     a_p = "PM";
            // }
            if (curr_hour == 0) {
                curr_hour = 12;
            }
            // if (curr_hour > 12) {
            //     curr_hour = curr_hour - 12;
            // }
            curr_hour = checkTime(curr_hour);
            curr_minute = checkTime(curr_minute);
            curr_second = checkTime(curr_second);
            // document.getElementById('jam').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
            document.getElementById('jam').innerHTML = curr_hour + ":" + curr_minute + ":" + curr_second;
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }
        setInterval(showTime, 500);
    </script>

</body>

</html>