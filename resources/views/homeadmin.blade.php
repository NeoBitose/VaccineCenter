@extends('layout.master');

@section('content')

<style>
    .card-group {
        display: grid;
        grid-template-columns: auto auto auto auto;
        grid-gap: 20px;
        width: 90%;
        margin: 30px auto;
    }

    .dashcard {
        background-color: whitesmoke;
        box-shadow: 0px 8px 24px lightgrey;
        padding: 30px 30px;
    }

    .data h3 {
        margin: 10px 0px;
        color: blue;
    }
</style>

<div class="card-group">
    <div class="dashcard">
        <div class="count">
            <p>{{$vaksin}}</p>
        </div>
        <div class="data">
            <h3>Produk Vaksin</h3>
        </div>
    </div>
    <div class="dashcard">
        <div class="count">
            <p>{{$center}}</p>
        </div>
        <div class="data">
            <h3>vaksin Center</h3>
        </div>
    </div>
    <div class="dashcard">
        <div class="count">
            <p>{{$admin}}</p>
        </div>
        <div class="data">
            <h3>Admin Vaksin</h3>
        </div>
    </div>
    <div class="dashcard">
        <div class="count">
            <p>{{$peserta}}</p>
        </div>
        <div class="data">
            <h3>Peserta</h3>
        </div>
    </div>
</div>

@endsection