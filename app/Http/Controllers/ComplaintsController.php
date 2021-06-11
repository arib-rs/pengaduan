<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintProgress;
use App\Models\Followup;
use App\Models\Job;
use App\Models\Mapping;
use App\Models\Media;
use App\Models\Response;
use App\Models\Scope;
use App\Models\Unit;
use App\Models\UnitMapping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $hari = [
        'Sunday' => 'Minggu',
        'Monday' => 'Senin',
        'Tuesday' => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jum\'at',
        'Saturday' => 'Sabtu'
    ];
    protected $bulan = [
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    ];
    function status($index)
    {
        $status = [];
        $tingkat = session()->get('user.level_id');
        if ($tingkat == 8) {
            $status = [
                0 => 'Terkirim',
                1 => 'Klasifikasi',
                2 => 'Proses',
                3 => 'Sudah Direspon',
                9 => 'Selesai',
                10 => 'Dikembalikan'
            ];
        } else {
            $status = [
                0 => '<span style="vertical-align: middle;" class="label label-success">Baru</span>',
                1 => '<span style="vertical-align: middle;" class="label label-warning">Belum Klasifikasi</span>',
                2 => '<span style="vertical-align: middle;" class="label label-warning">Menunggu Respon</span>',
                3 => 'Sudah Direspon',
                9 => 'Selesai',
                10 => 'Dikembalikan'
            ];
        }
        return $status[$index];
    }
    public function index()
    {
        $data['title'] = 'Daftar Pengaduan';
        $data['media'] = Media::orderBy('media', 'asc')->get();
        $data['jobs'] = Job::orderBy('pekerjaan', 'asc')->get();
        $data['bulan'] = $this->bulan;
        return view('pengaduan.index', $data);
    }
    public function getPengaduansByMonth($tahun, $bulan)
    {
        $unitId = session()->get('user.unit_id');
        $complaintId = Mapping::where('unit_id', '=', $unitId)->select('complaint_id')->groupBy('complaint_id')->get();
        $c = [];
        foreach($complaintId as $cid){
            $c[] = $cid->complaint_id;
        }
        
        // $data = Complaint::whereYear('created_at', '=', $tahun)
        // ->whereMonth('created_at', '=', $bulan)
        // ->whereIn('id', $c)
        // ->orderBy('created_at', 'desc')
        // ->get();
        // dd($data);

        $query = Complaint::whereYear('created_at', '=', $tahun)
        ->whereMonth('created_at', '=', $bulan)
        ->orderBy('created_at', 'desc');

        if (session()->get('user.level_id') != 1) {
            if (session()->get('user.level_id') == 8){
                $complaintIdUser = ComplaintProgress::where('user_id',session()->get('user.id'))->get();
                $cUser = [];
                foreach($complaintIdUser as $ciu){
                    $cUser[] = $ciu->complaint_id;
                }
                $query = $query->whereIn('id', $cUser);
            }else{
                $query = $query->whereIn('id', $c);
            }
        }

        $data = $query->get();

        return \DataTables::of($data)
            ->setRowClass(function ($data) {
                $interval = "";
                if ($data->is_urgent == 1) {
                    $interval = "+7 days";
                } else {
                    $interval = "+10 days";
                }
                $enddate = strtotime($data->created_at . $interval);
                $startdate_ = date('Y-m-d');
                $enddate_ = date('Y-m-d', $enddate);
                $awal  = date_create($startdate_);
                $akhir = date_create($enddate_);
                $diff  = date_diff($awal, $akhir);
                
                if($data->is_urgent == 1){
                    $class = 'aduan-urgent';
                    if($startdate_ > $enddate_){
                        $class = 'aduan-danger';
                    }
                }

                // return $data->is_urgent == 1 ? 'aduan-darurat' : '';
                return $class;
            })
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d-m-Y');
            })
            ->editColumn('status', function ($data) {
                return $this->status($data->status);
            })
            ->editColumn('alamat', function ($data) {
                $jalan = $data->alamat ? $data->alamat . ', ' : '';
                $desa = $data->desa ? $data->desa . ' - ' : '';
                return $jalan . $desa . $data->kecamatan;
            })
            ->addColumn('Aksi', function ($data) {
                return '
                <a href="pengaduan/' . $data->id . '" id="btn-view" class="btn btn-xs btn-primary" data-id="' .
                    $data->id .
                    '" title="Lihat Detail">
                <i class="fa fa-eye"></i>
                Lihat Detail
                </a>';
            })
            ->rawColumns(['Aksi', 'status'])
            ->addIndexColumn()
            ->make(true);
    }
    public function getProgresses($id)
    {
        $data = ComplaintProgress::where('complaint_id', '=', $id)
            ->orderBy('created_at', 'asc')
            ->get();
        return \DataTables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d-m-Y H:i:s');
            })
            ->make(true);
    }
    
    public function getResponses($id)
    {
        $data = Response::where('complaint_id', '=', $id)
            ->join('users','users.id','=','responses.responden')
            ->join('units','units.id','=','users.unit_id')
            ->orderBy('responses.created_at', 'asc')
            ->get();
        return \DataTables::of($data)
            ->editColumn('created_at', function ($data) {
                return $data->created_at->format('d-m-Y H:i:s');
            })
            ->make(true);
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
        $data['usertamu'] = false;
        if ($request->session()->get('user.level_id') == 9) {
            $data['usertamu'] = $request->session()->get('user');
        }
        // dd(Config::get('toastr'));
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
            'alamat' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'pekerjaan' => 'required',
            'email' => 'nullable|email',
            'media' => 'required',
            'subyek' => 'required',
            'uraian' => 'required',
            'foto_1' => 'image|mimes:jpeg,png,jpg,bmp,gif|max:2048',
            'foto_2' => 'image|mimes:jpeg,png,jpg,bmp,gif|max:2048',
            'foto_3' => 'image|mimes:jpeg,png,jpg,bmp,gif|max:2048',
            'kode_lanjutan' => 'nullable|exists:complaints,kode'
        ], [
            'kode_lanjutan.exists' => 'No. aduan lanjutan tidak tersedia.'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $kode = date('Y-md-His');
            $pict_1 = null;
            $pict_2 = null;
            $pict_3 = null;
            if ($request->foto_1) {
                $pict_1 = $kode . '_1' . '.' . $request->foto_1->extension();
                $request->foto_1->move(public_path('upload-photo'), $pict_1);
            }
            if ($request->foto_2) {
                $pict_2 = $kode . '_2' . '.' . $request->foto_2->extension();
                $request->foto_2->move(public_path('upload-photo'), $pict_2);
            }
            if ($request->foto_3) {
                $pict_3 = $kode . '_3' . '.' . $request->foto_3->extension();
                $request->foto_3->move(public_path('upload-photo'), $pict_3);
            }

            $lastInsertedId = Complaint::create(
                $request->except(['name', 'alamat', 'desa', 'kota', 'foto_1', 'foto_2', 'foto_3']) +
                    [
                        'name' => ucwords($request->name),
                        'alamat' => ucwords($request->alamat),
                        'desa' => ucwords($request->desa),
                        'kota' => ucwords($request->kota),
                        'kode' => $kode,
                        'status' => 0,
                        'sosmed' => $request->sosmed,
                        'pelapor' => $request->session()->get('user.id'),
                        'pict_1' => $pict_1,
                        'pict_2' => $pict_2,
                        'pict_3' => $pict_3
                    ]
            )->id;
            ComplaintProgress::create([
                'complaint_id' => $lastInsertedId,
                'aksi' => 'Simpan',
                'lokasi' => 'Sekretariat',
                'user_id' => $request->session()->get('user.id')
            ]);
            toastr()->success('Data telah disimpan. <br/> No. aduan <br/> ' . $kode);
            return response()->json(['success' => 'Data telah disimpan. <br/> No. aduan <br/> ' . $kode]);
        }
    }
    public function validasi(Request $request)
    {
        Complaint::find($request->id)->update(
            [
                'status' => 1,
                'is_valid' => TRUE
            ]
        );
        ComplaintProgress::create([
            'complaint_id' => $request->id,
            'aksi' => 'Validasi',
            'lokasi' => 'Manajemen',
            'user_id' => $request->session()->get('user.id')
        ]);
        toastr()->success('Data aduan berhasil divalidasi');
        return redirect('pengaduan/' . $request->id);
    }
    public function kembalikanSave(Request $request)
    {
        Complaint::find($request->id)->update(
            [
                'status' => 10,
                'is_valid' => FALSE,
                'alasan' => $request->alasan
            ]
        );
        ComplaintProgress::create([
            'complaint_id' => $request->id,
            'aksi' => 'Dikembalikan',
            'lokasi' => 'Manajemen'
        ]);
        toastr()->success('Data aduan berhasil dikembalikan');
        return redirect('pengaduan/' . $request->id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aduan = Complaint::with('job', 'media_', 'parent')->find($id);
        $respon = Response::where('complaint_id',$id)->first();
        $statusRespon = Response::where([['complaint_id',$id],['responden',session()->get('user.id')]])->first();
        
        $data['status'] = $this->status($aduan->status);
        $data['title'] = 'Detail Pengaduan';
        $data['bulan'] = $this->bulan;
        $data['aduan'] = $aduan;
        $data['respon'] = $respon;
        $data['statusRespon'] = $statusRespon;
        $data['startdate'] = $this->hari[$aduan->created_at->format('l')] . ', ' . $aduan->created_at->format('d-m-Y');
        $data['bidang'] = Scope::orderBy('bidang', 'asc')->get();
        $interval = "";
        if ($aduan->is_urgent == 1) {
            $interval = "+7 days";
        } else {
            $interval = "+10 days";
        }
        $enddate = strtotime($aduan->created_at . $interval);

        $startdate_ = date('Y-m-d');
        $enddate_ = date('Y-m-d', $enddate);
        $awal  = date_create($startdate_);
        $akhir = date_create($enddate_);
        $diff  = date_diff($awal, $akhir);

        $data['keterangan'] = "";
        if ($aduan->status <= 3) {
            if ($startdate_ < $enddate_) {
                $data['keterangan'] = "(Kurang " . $diff->days . " hari lagi)";
                $data['statusTerlambat'] = "";
            } else if ($startdate_ == $enddate_) {
                $data['keterangan'] = "(Hari terakhir)";
                $data['statusTerlambat'] = "";
            } else {
                $data['keterangan'] = "(Terlambat " . $diff->days . " hari)";
                $data['statusTerlambat'] = "aduan-danger";
            }
        }

        $data['enddate'] = $this->hari[date('l', $enddate)] . ', ' . date('d-m-Y', $enddate);

        if ($aduan->kode_lanjutan) {
            $data['prev'] = $aduan->parent->id;
        }

        return view('pengaduan.show', $data);
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

    public function storeKlasifikasi(Request $request){
        $unitMapping = UnitMapping::whereIn('scope_id', array_values($request->bidang))->distinct()->get();
        foreach($unitMapping as $up){
            Mapping::create([
                'complaint_id' => $request->id,
                'unit_id' => $up->unit_id,
                'scope_id' => $up->scope_id
            ]);
        }
        ComplaintProgress::create([
            'complaint_id' => $request->id,
            'aksi' => 'Klasifikasi',
            'lokasi' => 'Manajemen',
            'user_id' => $request->session()->get('user.id')
        ]);
        $affected = DB::table('complaints')->where('kode',$request->kode)->update(['status' => '2']);
        return response()->json(['success' => 'Data telah disimpan.']);
    }

    public function storeRespon(Request $request){
        // dd($request->all());
        $validator = \Validator::make($request->all(), [
            'uraian' => 'required',
            'lat' => 'required',
            'foto_1' => 'image|mimes:jpeg,png,jpg,bmp,gif|max:2048',
            'foto_2' => 'image|mimes:jpeg,png,jpg,bmp,gif|max:2048',
            'foto_3' => 'image|mimes:jpeg,png,jpg,bmp,gif|max:2048',
        ], [
            'kode_lanjutan.exists' => 'No. aduan lanjutan tidak tersedia.',
            'lat.required' => 'Silahkan pilih lokasi terlebih dahulu',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            $kode = date('Y-md-His');
            $pict_1 = null;
            $pict_2 = null;
            $pict_3 = null;
            if ($request->foto_1) {
                $pict_1 = $kode . '_1' . '.' . $request->foto_1->extension();
                $request->foto_1->move(public_path('upload-photo'), $pict_1);
            }
            if ($request->foto_2) {
                $pict_2 = $kode . '_2' . '.' . $request->foto_2->extension();
                $request->foto_2->move(public_path('upload-photo'), $pict_2);
            }
            if ($request->foto_3) {
                $pict_3 = $kode . '_3' . '.' . $request->foto_3->extension();
                $request->foto_3->move(public_path('upload-photo'), $pict_3);
            }

            $lastInsertedId = Response::create(
                $request->except(['foto_1', 'foto_2', 'foto_3']) +
                    [
                        'complaint_id' => $request->id,
                        'lat' => $request->lat,
                        'long' => $request->lng,
                        'jenis' => 'Respon',
                        'responden' => $request->session()->get('user.id'),
                        'pict_1' => $pict_1,
                        'pict_2' => $pict_2,
                        'pict_3' => $pict_3
                    ]
            )->id;

            $unit = Unit::where('id', '=', session()->get('user.unit_id'))->select('nama')->first();
            ComplaintProgress::create([
                'complaint_id' => $request->id,
                'aksi' => 'Respon',
                'lokasi' => $unit->nama,
                'user_id' => $request->session()->get('user.id')
            ]);
            $affected = DB::table('complaints')->where('id', $request->id)->update(['status' => '3']);
            toastr()->success('Data telah disimpan.');
            return response()->json(['success' => 'Data telah disimpan.']);
        }
    }

    public function storeFollowup(Request $request){
        // dd($request->all());
        $validator = \Validator::make($request->all(), [
            'tglmulai' => 'required',
            'tglselesai' => 'required',
            'kegiatan' => 'required',
            'biaya' => 'required',
            'sumber' => 'required',
            'detailsumber' => 'required',
            'dasar' => 'required',
            'tgldokumen' => 'required',
            'nodokumen' => 'required'
        ], [
            'tglmulai.required' => 'Silahkan isi tanggal pelaksanaan terlebih dahulu',
            'tglselesai.required' => 'Silahkan isi tanggal pelaksanaan terlebih dahulu',
            'kegiatan.required' => 'Silahkan isi kegiatan yang dilaksanakan terlebih dahulu',
            'biaya.required' => 'Silahkan isi biaya terlebih dahulu',
            'sumber.required' => 'Silahkan isi sumber dana terlebih dahulu',
            'detailsumber.required' => 'Silahkan isi detail sumber dana terlebih dahulu',
            'dasar.required' => 'Silahkan isi dasar pelaksanaan kegiatan terlebih dahulu',
            'tgldokumen.required' => 'Silahkan isi tanggal dokumen terlebih dahulu',
            'nodokumen.required' => 'Silahkan isi nomor dokumen terlebih dahulu',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        } else {
            Followup::create([
                'complaint_id' => $request->id,
                'user_id' => session()->get('user.id'),
                'tgl_mulai' => $request->tglmulai,
                'tgl_selesai' => $request->tglselesai,
                'kegiatan' => $request->kegiatan,
                'biaya' => $request->biaya,
                'sumber' => $request->sumber,
                'detail_sumber' => $request->detailsumber,
                'dasar' => $request->dasar,
                'tgl_dokumen' => $request->tgldokumen,
                'no_dokumen' => $request->nodokumen,
                'rekanan' => $request->rekanan,
            ]);

            $unit = Unit::where('id', '=', session()->get('user.unit_id'))->select('nama')->first();
            ComplaintProgress::create([
                'complaint_id' => $request->id,
                'aksi' => 'Respon',
                'lokasi' => $unit->nama,
                'user_id' => $request->session()->get('user.id')
            ]);
            // $affected = DB::table('complaints')->where('kode',$request->kode)->update(['status' => '2']);
            return response()->json(['success' => 'Data telah disimpan.']);
        }
    }
}
