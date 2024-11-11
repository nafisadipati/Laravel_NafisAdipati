<?php

namespace App\Http\Controllers;

use App\Models\Hospitals;
use App\Models\Patients;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patients::with('hospital')->get();
        $hospitals = Hospitals::all();
        return view('patients.index', compact('patients', 'hospitals'));
    }

    public function store(Request $request)
    {
        Patients::create($request->all());
        return redirect()->route('patients.index');
    }

    public function destroy($id)
    {
        Patients::find($id)->delete();
        return response()->json(['success' => 'Patients deleted successfully.']);
    }

    public function filterByHospital(Request $request)
    {
        $Patientss = Patients::where('hospital_id', $request->hospital_id)
            ->with('hospital')->get();
        return response()->json($Patientss);
    }

    public function show(Request $request)
    {
        $Patientss = Patients::where('hospital_id', $request->hospital_id)
            ->with('hospital')->get();
        return response()->json($Patientss);
    }
}
