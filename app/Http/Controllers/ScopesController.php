<?php

namespace App\Http\Controllers;

use App\Models\Scope;
use Illuminate\Http\Request;

class ScopesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar Bidang';
        $data['bidang'] = Scope::all();
        return view('bidang.index', $data);
    }
    public function getScopes()
    {
        // $data = Scope::all();
        $data = Scope::orderBy('bidang','asc')->get();
        return \DataTables::of($data)
            ->addColumn('Aksi', function ($data) {
                return '<a id="btn-edit" class="btn btn-xs btn-primary" data-id="' . $data->id . '" title="Edit Data">
                <i class="fa fa-pencil"></i>
                </a>
                <a id="btn-delete" class="btn btn-xs btn-danger" data-id="' . $data->id . '" title="Hapus Data">
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
            'bidang' => 'required'
        ]);

        if ($validator->fails()) {
              return response()->json(['errors' => $validator->errors()->all()]);
        }else{

        Scope::create(['bidang' => $request->bidang]);

          return response()->json(['success'=>'Data telah disimpan.']);
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
        $data = Scope::find($id);
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
            'bidang' => 'required'
        ]);

        if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all()]);
        }

        Scope::find($id)->update(['bidang' => $request->bidang]);

        return response()->json(['success'=>'Data telah disimpan.']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Scope::find($id)->delete();
        return response()->json(['success'=>'Data telah dihapus.']);
    }
}
