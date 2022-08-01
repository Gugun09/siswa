<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class GuruController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
    	$guru = User::where('role', 'guru')->get();
    	return view('guru.index', compact('guru'));
    }

    public function create()
    {
    	return view('guru.add');
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
    		'role' => 'guru'
    	]);

    	return redirect()->back();
    }

    public function edit($id)
    {
    	$user = User::findOrFail($id);
    	return view('guru.edit', compact('user'));
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
    		'role' => 'guru'
    	]);

    	return redirect(route('guru.index'));
    }

    public function delete($id)
    {
    	$user = User::findOrFail($id);
    	$user->destroy($id);
    	return redirect()->back();
    }
}
