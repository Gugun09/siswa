<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mapel;

class MapelController extends Controller
{
    public function index()
    {
    	$mapel = Mapel::all();
    	return view('mapel.index', compact('mapel'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'kode_mapel' => 'required',
    		'mapel' => 'required',
    	]);

    	$kelas = Mapel::create($request->all());
    	return redirect()->back();
    }

    public function edit($id)
    {
    	$edit = Mapel::find($id);
        return response()->json($edit);
    }

    public function update(Request $request)
    {
    	$id = Mapel::find($request->id);
    	$id->update([
    		'mapel' => $request->mapel,
    	]);

    	return redirect()->back();
    }

    public function destroy($id)
    {
    	$delete = Mapel::find($id);
    	$delete->delete();
    	return redirect()->back();
    }
}
