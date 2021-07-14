<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        // dd(session()->all());
        if (Auth::user()->level_id == 9) {
            return redirect()->route('pengaduan.create');
        }
        $data['title'] = 'Dashboard';
        $data['tahun'] = Complaint::select(DB::raw('YEAR(created_at) as year'))
            ->distinct()
            ->orderBy('year', 'desc')
            ->get();
        $data['y'] = $request->input('y') ? $request->input('y') : date('Y');

        if ($data['y'] != 'all') {
            $data['total'] = Complaint::whereYear('created_at', '=', $data['y'])->count();
            $data['baru'] = Complaint::whereYear('created_at', '=', $data['y'])->where('status', '=', 0)->count();
            $data['klasifikasi'] = Complaint::whereYear('created_at', '=', $data['y'])->where('status', '=', 1)->count();
            $data['respon'] = Complaint::whereYear('created_at', '=', $data['y'])->where('status', '=', 2)->count();
            $data['selesai'] = Complaint::whereYear('created_at', '=', $data['y'])->where('status', '=', 9)->count();
        } else {
            $data['total'] = Complaint::count();
            $data['baru'] = Complaint::where('status', '=', 0)->count();
            $data['klasifikasi'] = Complaint::where('status', '=', 1)->count();
            $data['respon'] = Complaint::where('status', '=', 2)->count();
            $data['selesai'] = Complaint::where('status', '=', 9)->count();
        }

        return view('home', $data);
    }
}
