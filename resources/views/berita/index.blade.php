@extends('layout.master')
@section('content')
    <div class="berita">
        @if (session()->get('role') == 'admin')
            <a href="/berita/create"><button class="btn-alif">Tambah Berita</button></a>
            <div class="berita-content">
                @foreach ($berita as $data)
                    <div class="card-berita">
                        <img src="{{ asset('asset/image/') }}/{{ $data->gambar }}" width="100%" />
                        <div class="container-card">
                            <h4>{{ $data->judul }}</h4>
                            <p>
                                {{ $data->deskripsi }}
                            </p>
                            <h5>{{ $data->tanggal }}</h5>
                            <br />
                        </div>
                        <div class="btn-card">
                            <div class="button-group inline-2 " style="">
                            
                                <a href="/berita/{{ $data->id_berita }}/edit"><button class="btn-alif">Edit</button></a>
                                <form action="/berita/{{ $data->id_berita }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn-alif">Hapus</button>
                                </form>
    
                            </div>
                        </div>
                        
                    </div>
                @endforeach
            </div>
        @endif
        @if (session()->get('role') == 'admincenter' || session()->get('role') == 'peserta')

            <div class="berita-content">
                @foreach ($berita as $data)
                    <div class="card-berita">
                        <img src="{{ asset('asset/image/') }}/{{ $data->gambar }}" width="100%" />
                        <div class="container-card">
                            <h4>{{ $data->judul }}</h4>
                            <p>
                                {{ $data->deskripsi }}
                            </p>
                            <h5>{{ $data->tanggal }}</h5>
                            <br />
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

    </div>
@endsection
