<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminModel;
use App\Models\AdminCenterModel;
use App\Models\PesertaModel;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginadmin()
    {

        if (session('logged_in')) {
            return abort(404);
        }

        return view('auth.loginadmin');
    }

    public function authadmin()
    {

        if (!session('logged_in')) {

            request()->validate([
                'password' => 'min:8'
            ], [
                'password.min' => 'password minimal 8 karakter'
            ]);

            $data = AdminModel::where('username', request()->username)->first();

            if ($data) {
                if (Hash::check(request()->password, $data->password)) {
                    session()->put([
                        'id_user' => $data->id_user,
                        'username' => $data->username,
                        'name' => $data->first_name . " " . $data->last_name,
                        'role' => 'admin',
                        'logged_in' => true,
                    ]);
                    return redirect('/homeadmin');
                } else {
                    return redirect('/loginadmin')->withErrors(['password' => 'password salah']);
                }
            } else {
                return redirect('/loginadmin')->withErrors(['msg' => 'Admin tidak terdaftar']);
            }
        } else {
            return abort(404);
        }
    }

    public function logincenter()
    {

        if (session('logged_in')) {
            return abort(404);
        }

        return view('auth.logincenter');
    }

    public function authcenter()
    {

        if (!session('logged_in')) {

            request()->validate([
                'password' => 'min:8'
            ], [
                'password.min' => 'password minimal 8 karakter'
            ]);

            $data = AdminCenterModel::where('username', request()->username)->first();

            if ($data) {
                if (Hash::check(request()->password, $data->password)) {
                    session()->put([
                        'id_user' => $data->id_user_center,
                        'username' => $data->username,
                        'name' => $data->first_name . " " . $data->last_name,
                        'center' => $data->center_id,
                        'role' => 'admincenter',
                        'logged_in' => true,
                    ]);
                    return redirect('/homecenter');
                } else {
                    return redirect('/logincenter')->withErrors(['password' => 'password salah']);
                }
            } else {
                return redirect('/logincenter')->withErrors(['msg' => 'Admin tidak terdaftar']);
            }
        } else {
            return abort(404);
        }
    }

    public function loginpeserta()
    {
        if (session('logged_in')) {
            return abort(404);
        }

        return view('auth.loginpeserta');
    }

    public function authpeserta()
    {
        if (!session('logged_in')) {

            request()->validate([
                'nik' => 'min:16|max:16',
                'password' => 'min:8'
            ], [
                'nik.min' => 'NIK berisi 16 karakter',
                'nik.max' => 'NIK berisi 16 karakter',
                'password.min' => 'password minimal 8 karakter',

            ]);

            $data = PesertaModel::where('nik', request()->nik)->first();

            if ($data) {
                if (Hash::check(request()->password, $data->password)) {
                    session()->put([
                        'id_peserta' => $data->id_peserta,
                        'name' => $data->first_name . " " . $data->last_name,
                        'profile' => $data->foto_peserta,
                        'role' => 'peserta',
                        'logged_in' => true,
                    ]);
                    return redirect('/homepeserta');
                } else {
                    return redirect('/loginpeserta')->withErrors(['password' => 'password salah']);
                }
            } else {
                return redirect('/loginpeserta')->withErrors(['msg' => 'Peserta tidak terdaftar']);
            }
        } else {
            return abort(404);
        }
    }

    public function registrasi()
    {
        if (session('logged_in')) {
            return abort(404);
        }

        return view('auth.register');
    }

    public function authregistrasi()
    {

        if (!session('logged_in')) {

            $umur = Carbon::parse(request()->tanggal_lahir)->age;

            if ($umur < 6) {

                return redirect()->back()->withErrors(['usia' => 'Usia tidak mencukupi']);
            }

            request()->validate([
                'nik' => 'unique:peserta|min:16|max:16',
                'kontak' => 'unique:peserta|min:11',
            ], [
                'nik.unique' => 'NIK sudah digunakan',
                'nik.max' => 'NIK harus 16 karakter',
                'nik.min' => 'NIK harus 16 karakter',
                'kontak.unique' => 'No telepon sudah digunakan',
                'kontak.min' => 'Nomor Minimal 11',
            ]);

            PesertaModel::insert([
                'nik' => request()->nik,
                'password' => Hash::make(request()->password),
                'first_name' => request()->awal,
                'last_name' => request()->akhir,
                'tanggal_lahir' => request()->tanggal_lahir,
                'tempat_lahir' => request()->tempat_lahir,
                'umur' => $umur,
                'alamat' => request()->alamat,
                'kontak' => request()->kontak,
            ]);

            return redirect('/loginpeserta');
        } else {
            return abort(404);
        }
    }

    public function logout()
    {
        Session()->flush();
        return redirect('/');
    }
}
