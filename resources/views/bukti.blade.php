<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .bukti h3,
        h2 {
            text-align: center;
            margin-top: 20px;
        }

        .bukti h4 {
            margin-top: 5rem;
            text-align: right;
            color: #0086e6;
        }

        .card {
            width: 100%;
            margin: 20px auto;
        }

        .datadirit {
            width: 70%;
            margin: 60px 0px;
            border: none;
        }

        .vaksint {
            width: 100%;
        }


        .vaksint td {
            border: 1px solid lightgrey;
            padding: 10px;
        }

        .vaksint th {
            border: 0.5px solid #0086e6;
            padding: 10px;
        }

        .vaksint th {
            text-align: left;
            background-color: #008ff5;
            color: white;
        }

        .flex {
            display: grid;
            grid-template-columns: 'auto auto auto';
        }

        .logoc {
            position: absolute;
            top: 15px;
            right: 0px;
            display: grid;
            grid-template-columns: auto auto;
        }
    </style>
</head>

<body>
    <div class="bukti">
        <div class="m-auto w-50">
            <div class="card">
                <div class="">
                    <img src="{{public_path('asset/image/logo.png')}}" class="logoc" width="180" class="" alt="">
                </div>

                <div class="">
                    <img src="{{public_path('asset/image/dinkes.png')}}" width="110" alt="">
                    <img src="{{public_path('asset/image/bpjs.png')}}" width="110" alt="">
                </div>
                <hr style="border: 1px solid grey;">
                <br>
                <h2>Bukti Vaksinasi</h2>
                <!-- <h3>{{$report->nama}}</h3><br> -->
                <table class="datadirit">
                    <tr>
                        <td>NIK</td>
                        <td>:</td>
                        <td>{{$report->nik}}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td>{{$report->first_name}} {{$report->last_name}}</td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td>{{$report->alamat}}</td>
                    </tr>
                    <tr>
                        <td>Tempat tanggal lahir</td>
                        <td>:</td>
                        <td>{{$report->tempat_lahir}}, {{$report->tanggal_lahir}}</td>
                    </tr>
                    <tr>
                        <td>No telepon</td>
                        <td>:</td>
                        <td>{{$report->kontak}}</td>
                    </tr>
                </table>

                <table class="vaksint" cellspacing="0" cellpadding="1">
                    <tr>

                        <th>Tanggal vaksinasi</th>
                        <th>Penyelenggara</th>
                        <th>Nama Vaksin</th>
                        <th>Lokasi vaksinasi</th>
                        <th>Keterangan</th>

                    </tr>
                    <tr>
                        <td>{{$report->tanggal}}</td>
                        <td>{{$report->nama}}</td>
                        <td>{{$report->brand}}</td>
                        <td>{{$report->tempat}}</td>
                        <td>{{$report->status}}</td>
                    </tr>
                </table>

                <h4>Tenaga Kesehatan <br> <span style="font-size: 10pt; color:gray; line-height:20px;">{{$report->nama}}</span></h4>
            </div>
        </div>
    </div>

</body>

</html>