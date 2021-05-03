<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar User';
        return view('user.index', $data);
    }
    public function getTingkatsOpds()
    {
        $levels = Level::orderBy('id', 'desc')->get();
        $units = Unit::orderBy('nama', 'asc')->get();
        $data['tingkats'] = "<option value=''>-- Pilih Tingkatan User --</option>";
        $data['opds'] = "<option value=''>-- Pilih OPD --</option>";
        foreach ($levels as $d) {
            $data['tingkats'] .= "<option value='" . $d->id . "'>" . $d->level . "</option>";
        }
        foreach ($units as $d) {
            $data['opds'] .= "<option value='" . $d->id . "'>" . $d->nama . "</option>";
        }
        return response()->json($data);
    }
    public function getUsers()
    {
        $data = User::with('level', 'unit')->orderBy('name', 'asc')->get();
        return \DataTables::of($data)
            ->addColumn('Aksi', function ($data) {
                return '<a id="btn-edit" class="btn btn-xs btn-primary" data-id="' .
                $data->id .
                '" title="Edit Data">
                <i class="fa fa-pencil"></i>
                </a>
                <a id="btn-delete" class="btn btn-xs btn-danger" data-id="' .
                $data->id .
                    '" title="Hapus Data">
                <i class="fa fa-trash"></i>
                </a>';
            })
            ->rawColumns(['Aksi'])
            ->addIndexColumn()
            ->make(true);
    }
    public function resetPassword($id)
    {
        User::find($id)->update([
            'password' => Hash::make('00000000'),
        ]);

        return response()->json(['success' => 'Data telah disimpan.']);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'kode' => 'required|unique:users',
            'name' => 'required',
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'level' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            User::create([
                'kode' => $request->kode,
                'name' => ucwords($request->name),
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'level_id' => $request->level,
                'unit_id' => $request->opd,
                'is_active' => true,
            ]);

            return response()->json(['success' => 'Data telah disimpan.']);
        }

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
        $data['user'] = User::find($id);
        $levels = Level::orderBy('id', 'desc')->get();
        $units = Unit::orderBy('nama', 'asc')->get();
        $data['tingkats'] = "";
        $data['opds'] = "";
        foreach ($levels as $d) {
            $data['tingkats'] .= "<option value='" . $d->id . "'>" . $d->level . "</option>";
        }
        foreach ($units as $d) {
            $data['opds'] .= "<option value='" . $d->id . "'>" . $d->nama . "</option>";
        }

        return response()->json($data);
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
        $validator = \Validator::make($request->all(), [
            'kode' => "required|unique:users,kode," . $id,
            'name' => 'required',
            'email' => ['required', 'string', 'email', "unique:users,email," . $id],
            'level' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            User::find($id)->update([
                'kode' => $request->kode,
                'name' => ucwords($request->name),
                'email' => $request->email,
                'level_id' => $request->level,
                'unit_id' => $request->opd,
            ]);

            return response()->json(['success' => 'Data telah disimpan.']);
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
        User::find($id)->delete();
        return response()->json(['success' => 'Data telah dihapus.']);

    }
}
