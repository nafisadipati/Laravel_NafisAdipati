<?php

namespace App\Http\Controllers;

use App\Models\Hospitals;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospitals::all();
        return view('hospitals.index', compact('hospitals'));
    }

    public function store(Request $request)
    {
        Hospitals::create($request->all());
        return redirect()->route('hospitals.index');
    }

    public function destroy($id)
    {
        Hospitals::find($id)->delete();
        return response()->json(['success' => 'Hospital deleted successfully.']);
    }
}
