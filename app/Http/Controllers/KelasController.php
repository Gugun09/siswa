<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    public function index()
    {
    	$kelas = Kelas::all();
    	return view('kelas.index', compact('kelas'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'kd_kelas' => 'required',
    		'nama_kelas' => 'required'
    	]);

    	$kelas = Kelas::create($request->all());
    	return redirect()->back();
    }

    public function edit($id)
    {
    	$edit = Kelas::find($id);
        return response()->json($edit);
    }

    public function update(Request $request)
    {
    	$id = Kelas::find($request->id);
    	$id->update([
    		'nama_kelas' => $request->nama_kelas
    	]);

    	return redirect()->back();
    }

    public function destroy($id)
    {
    	$delete = Kelas::find($id);
    	$delete->delete();
    	return redirect()->back();
    }
}
