<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends Controller
{
    public function index()
    {
    	$semester = Semester::all();
    	return view('semester.index', compact('semester'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'semester' => 'required',
    	]);

    	$kelas = Semester::create($request->all());
    	return redirect()->back();
    }

    public function edit($id)
    {
    	$edit = Semester::find($id);
        return response()->json($edit);
    }

    public function update(Request $request)
    {
    	$id = Semester::find($request->id);
    	$id->update([
    		'semester' => $request->semester,
    		'status' => $request->status
    	]);

    	return redirect()->back();
    }

    public function destroy($id)
    {
    	$delete = Semester::find($id);
    	$delete->delete();
    	return redirect()->back();
    }
}
