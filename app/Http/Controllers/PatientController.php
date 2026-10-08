<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        $patients = Patient::all();

        return view('patients.index', compact('patients'));
    }

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required',
        ]);

        Patient::create([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'course' => $request->course,
            'year_level' => $request->year_level,
        ]);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient added successfully.');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $request->validate([
            'student_id' => 'required',
            'name' => 'required',
            'course' => 'required',
            'year_level' => 'required',
        ]);

        $patient->update([
            'student_id' => $request->student_id,
            'name' => $request->name,
            'course' => $request->course,
            'year_level' => $request->year_level,
        ]);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient updated successfully.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient deleted successfully.');
    }
}