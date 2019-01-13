<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Visit;
use App\Patient;
Use App\Doctor;

class VisitsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // redirects to login page if not logged in
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = Visit::orderBy('id', 'asc')->get();
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('visits.index')->with([
            'visits' => $visits,
            'doctors' => $doctors,
            'patients' => $patients
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::pluck('name', 'id');
        $patients = Patient::pluck('name', 'id');
        return view('visits.create')->with([
            'doctors' => $doctors,
            'patients' => $patients
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation
        $this->validate($request, [
            'date' => 'required|date',
            'time' => 'required',
            'duration' => 'required',
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'cost' => 'required|numeric'
        ]);

        // Create Visit
        $visit = new Visit;
        $visit->date = $request->input('date');
        $visit->date = date('Y-m-d', strtotime($visit->date));
        $visit->time = $request->input('time');
        $visit->duration = $request->input('duration');
        $visit->patient_id = $request->input('patient_id');
        $visit->doctor_id = $request->input('doctor_id');
        $visit->cost = $request->input('cost');
        $visit->save();
        
        // return to visits index with success message
        return redirect('/visits')->with('success', 'Visit scheduled successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // to create object of viewed Visit
        $visit = Visit::find($id);
        $doctor = Doctor::find($visit->doctor_id);
        $patient = Patient::find($visit->patient_id);
        // to go to view and reference the object with visit information for use in view
        return view('visits.show')->with(['visit' => $visit, 'doctor' => $doctor, 'patient' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visit = Visit::find($id);
        $doctors = Doctor::pluck('name', 'id');
        $patients = Patient::pluck('name', 'id');
        return view('visits.edit')->with(['visit' => $visit, 'doctors' => $doctors,'patients' => $patients]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validation
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required',
            'duration' => 'required',
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'cost' => 'required|numeric'
        ]);

        // Create Visit
        $visit = new Visit;
        $visit->date = $request->input('date');
        $visit->date = date('Y-m-d', strtotime($visit->date));
        $visit->time = $request->input('time');
        $visit->duration = $request->input('duration');
        $visit->patient_id = $request->input('patient_id');
        $visit->doctor_id = $request->input('doctor_id');
        $visit->cost = $request->input('cost');
        $visit->save();
        
        // return to visit show page with success message
        return redirect('/visits/'.$visit->id)->with('success', 'Visit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit = Visit::find($id);
        $visit->delete();

        // return to visits index page with success message
        return redirect('/visits')->with('success', 'Visit deleted successfully.');
    }
}
