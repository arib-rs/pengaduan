<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
    public function getUsers()
    {
        $data = User::with('level')->orderBy('nama', 'asc')->get();
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
        //
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
        $data = User::find($id)->with('level');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
