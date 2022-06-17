<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminCenterModel;
use App\Models\CenterModel;
use Illuminate\Support\Facades\Hash;
use Psy\CodeCleaner\ValidConstructorPass;

class AdminCenterController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admincenter = AdminCenterModel::leftjoin('vaksin_center', 'admin_center.center_id', 'vaksin_center.id_center')->get();
        return view('admincenter.index', compact('admincenter'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datacenter = CenterModel::all();
        return view('admincenter.add', compact('datacenter'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'username' => 'unique:admin_center',
            'password' => 'min:8'
        ], [
            'username.unique' => 'username sudah dipakai',
            'password.min' => 'password minimal 8'
        ]);

        AdminCenterModel::insert([
            'center_id' => request()->center,
            'username' => request()->username,
            'password' => Hash::make(request()->password),
            'first_name' => request()->awal,
            'last_name' => request()->akhir,
        ]);

        return redirect('/admincenter');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $datacenter = CenterModel::all();
        $dataadmin = AdminCenterModel::leftjoin('vaksin_center', 'admin_center.center_id', 'vaksin_center.id_center')->where('id_user_center', $id)->first();

        return view('admincenter.edit', compact('datacenter', 'dataadmin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataadmin = AdminCenterModel::where('id_user_center', $id)->first();

        if (request()->username != $dataadmin->username) {

            request()->validate([
                'username' => 'unique:admin_center',
            ], [
                'username.unique' => 'username sudah dipakai',
            ]);

            AdminCenterModel::where('id_user_center', $id)->update([
                'center_id' => request()->center,
                'username' => request()->username,
                'first_name' => request()->awal,
                'last_name' => request()->akhir,
            ]);

            return redirect('/admincenter');
        } else {

            AdminCenterModel::where('id_user_center', $id)->update([
                'center_id' => request()->center,
                'username' => request()->username,
                'first_name' => request()->awal,
                'last_name' => request()->akhir,
            ]);

            return redirect('/admincenter');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminCenterModel::where('id_user_center', $id)->delete();
        return redirect('/admincenter');
    }
}
