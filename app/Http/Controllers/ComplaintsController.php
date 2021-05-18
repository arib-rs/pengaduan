<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Job;
use App\Models\Media;
use Illuminate\Http\Request;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Daftar Pengaduan';
        $data['media'] = Media::orderBy('media', 'asc')->get();
        $data['jobs'] = Job::orderBy('pekerjaan', 'asc')->get();

        return view('pengaduan.index', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['title'] = 'Form Pengaduan';
        $data['media'] = Media::orderBy('media', 'asc')->get();
        $data['jobs'] = Job::orderBy('pekerjaan', 'asc')->get();
        return view('pengaduan.create', $data);
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
            'name' => 'required',
            'pekerjaan' => 'required',
            'media' => 'required',
            'pict_1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pict_2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pict_3' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $pict_1 = null;
            $pict_2 = null;
            $pict_3 = null;
            if ($request->pict_1) {
                $pict_1 = date('YmdHis') . '_1' . '.' . $request->pict_1->extension();
                $request->pict_1->move(public_path('upload-photo'), $pict_1);
            }
            if ($request->pict_2) {
                $pict_2 = date('YmdHis') . '_2' . '.' . $request->pict_2->extension();
                $request->pict_2->move(public_path('upload-photo'), $pict_2);
            }
            if ($request->pict_3) {
                $pict_3 = date('YmdHis') . '_3' . '.' . $request->pict_3->extension();
                $request->pict_3->move(public_path('upload-photo'), $pict_3);
            }


            Complaint::create(
                $request->except(['pict_1', 'pict_2', 'pict_3']) +
                    [
                        'kode' => date('YmdHis'),
                        'status' => 0,
                        'pelapor' => $request->session()->get('id'),
                        'pict_1' => $pict_1,
                        'pict_2' => $pict_2,
                        'pict_3' => $pict_3
                    ]
            );
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
        //
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
