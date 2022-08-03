<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Walas;
use App\Models\User;
use App\Models\Kelas;

class WalasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$wali = Walas::with(['kelas','user'])->get();
    	// return $wali;
    	$guru = User::where(['role' => 'guru'])->get();
    	$kelas = Kelas::orderBy('nama_kelas', 'ASC')->get();
    	return view('walas.index', compact('wali','guru','kelas'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'user_id' => 'required',
    		'kelas_id' => 'required'
    	]);

    	$walas = Walas::create([
    		'user_id' => $request->user_id,
    		'kelas_id' => $request->kelas_id,
    	]);

    	return redirect()->back();
    }

    public function edit($id)
    {
    	$edit = Walas::find($id);
        return response()->json($edit);
    }

    public function update(Request $request)
    {
    	$id = Walas::find($request->id);
    	$id->update([
    		'user_id' => $request->user_id,
    		'kelas_id' => $request->kelas_id,
    	]);

    	return redirect()->back();
    }

    public function destroy($id)
    {
    	$delete = Walas::find($id);
    	$delete->delete();
    	return redirect()->back();
    }
}
