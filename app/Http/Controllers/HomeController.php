<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PesertaModel;
use App\Models\AdminCenterModel;
use App\Models\VaksinModel;
use App\Models\CenterModel;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->only('homeadmin');
        $this->middleware('admincenter')->only('homecenter');
        $this->middleware('peserta')->only('homepeserta');
    }

    public function homeadmin()
    {
        $peserta = PesertaModel::count();
        $admin = AdminCenterModel::count();
        $vaksin = VaksinModel::count();
        $center = CenterModel::count();
        return view('homeadmin', compact('peserta', 'admin', 'vaksin', 'center'));
    }

    public function homecenter()
    {
        return view('homecenter');
    }

    public function homepeserta()
    {
        return view('homepeserta');
    }
}
