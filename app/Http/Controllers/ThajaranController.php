<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thajaran;

class ThajaranController extends Controller
{
    public function index()
    {
    	$ajaran = Thajaran::all();
    	return view('th_ajaran.index', compact('ajaran'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'tahun_ajaran' => 'required',
    	]);

    	$kelas = Thajaran::create($request->all());
    	return redirect()->back();
    }

    public function edit($id)
    {
    	$edit = Thajaran::find($id);
        return response()->json($edit);
    }

    public function update(Request $request)
    {
    	$id = Thajaran::find($request->id);
    	$id->update([
    		'tahun_ajaran' => $request->tahun_ajaran,
    		'status' => $request->status
    	]);

    	return redirect()->back();
    }

    public function destroy($id)
    {
    	$delete = Thajaran::find($id);
    	$delete->delete();
    	return redirect()->back();
    }
}
