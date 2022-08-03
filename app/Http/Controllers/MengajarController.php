<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thajaran;
use App\Models\Semester;
use App\Models\Mengajar;
use App\Models\User;
use App\Models\Mapel;
use App\Models\Kelas;

class MengajarController extends Controller
{
    public function index()
    {
    	$mengajar = Mengajar::all();
        $guru =  User::where('role','guru')->get();
    	return view('mengajar.index', compact('mengajar'));
    }

    public function create()
    {
    	$thajaran = Thajaran::where(['status' => 1])->first();
    	// dd($thajaran['tahun_ajaran']);
    	$semester = Semester::where(['status' => 1])->first();
        $guru = User::where('role','guru')->get();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
    	return view('mengajar.add', compact('thajaran','semester','guru','mapel','kelas'));
    }

    public function store(Request $request)
    {
        Mengajar::create($request->all());
        return redirect()->back();
    }
}
