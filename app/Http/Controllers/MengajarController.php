<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thajaran;
use App\Models\Semester;
use App\Models\Mengajar;

class MengajarController extends Controller
{
    public function index()
    {
    	$mengajar = Mengajar::all();
    	return view('mengajar.index', compact('mengajar'));
    }

    public function create()
    {
    	$thajaran = Thajaran::where(['status' => 1])->first();
    	// dd($thajaran['tahun_ajaran']);
    	$semester = Semester::where(['status' => 1])->first();
    	return view('mengajar.add', compact('thajaran','semester'));
    }
}
