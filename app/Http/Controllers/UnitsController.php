<?php

namespace App\Http\Controllers;

use App\Models\Scope;
use App\Models\Unit;
use App\Models\UnitMapping;
use Illuminate\Http\Request;

class UnitsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar OPD';
        $data['bidang'] = Scope::orderBy('bidang', 'asc')->get();
        return view('opd.index', $data);
    }
    public function getTingkats()
    {
        $data = "
            <option value='Induk'>Induk</option>
            <option value='Sub'>Sub</option>
            <option value='Kecamatan'>Kecamatan</option>
            <option value='Desa/Kelurahan'>Desa/Kelurahan</option>
        ";
        return response()->json($data);
    }
    public function getOpds()
    {
        $data = Unit::orderBy('nama', 'asc')->get();
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
            'kode' => 'required',
            'nama' => 'required',
            'tingkat' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $lastInsertedId = Unit::create([
                'kode' => $request->kode,
                'nama' => ucwords($request->nama),
                'alamat' => ucwords($request->alamat),
                'telepon' => $request->telepon,
                'email' => $request->email,
                'tingkat' => $request->tingkat,
                'is_active' => true
            ])->id;
            UnitMapping::where('unit_id', $lastInsertedId)->delete();
            foreach ($request->bidang as $d) {
                UnitMapping::create([
                    'unit_id' => $lastInsertedId,
                    'scope_id' => $d
                ]);
            }

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
        $data['opd'] = Unit::find($id);
        $data['mapping'] = UnitMapping::with('scope', 'unit')->where('unit_id', $id)->get();
        $data['tingkat'] = "
            <option value='Induk'>Induk</option>
            <option value='Sub'>Sub</option>
            <option value='Kecamatan'>Kecamatan</option>
            <option value='Desa/Kelurahan'>Desa/Kelurahan</option>";
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
            'kode' => 'required',
            'nama' => 'required',
            'tingkat' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            Unit::find($id)->update([
                'kode' => $request->kode,
                'nama' => ucwords($request->nama),
                'alamat' => ucwords($request->alamat),
                'telepon' => $request->telepon,
                'email' => $request->email,
                'tingkat' => $request->tingkat
            ]);
            UnitMapping::where('unit_id', $id)->delete();
            foreach ($request->bidang as $d) {
                UnitMapping::create([
                    'unit_id' => $id,
                    'scope_id' => $d
                ]);
            }
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
        Unit::find($id)->delete();
        return response()->json(['success' => 'Data telah dihapus.']);
    }
}
