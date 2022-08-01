<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
    	$siswa = Siswa::with(['user','kelas'])->get();
    	// return $siswa;
    	return view('siswa.index', compact('siswa'));
    }

    public function create()
    {
    	$kelas = Kelas::all();
    	return view('siswa.add', compact('kelas'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'nip' => 'required',
    		'name' => 'required',
    		'email' => 'required|unique:users',
    	]);
    	$user = User::create([
    		'nip' => $request->nip,
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->nip),
    		'status' => 'Y',
    		'role' => 'siswa'
    	]);
    	// return $user->id;
    	Siswa::create([
    		'user_id' => $user->id,
    		'tempat_lahir' => $request->tempat_lahir,
    		'tgl_lahir' => $request->tgl_lahir,
    		'jk' => $request->jk,
    		'alamat' => $request->alamat,
    		'status' => 'Y',
    		'th_angkatan' => $request->th_angkatan,
    		'kelas_id' => $request->kelas_id,
    	]);

    	return redirect()->back();
    }

    public function edit($id)
    {
    	$user = User::findOrFail($id);
    	return view('siswa.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
    	$user = User::findOrFail($id);

    	$user->update([
    		'nip' => $request->nip,
    		'name' => $request->name,
    		'email' => $request->email,
    		'password' => bcrypt($request->nip),
    		'status' => 'Y',
    		'role' => 'siswa'
    	]);

    	return redirect(route('siswa.index'));
    }

    public function delete($id)
    {
    	$user = User::findOrFail($id);
    	$user->destroy($id);
    	return redirect()->back();
    }
}
