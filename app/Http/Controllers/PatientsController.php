<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Patient;
use App\Visit;

class PatientsController extends Controller
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
        $patients = Patient::orderBy('id', 'asc')->get();
        return view('patients.index')->with('patients', $patients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
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
            'name' => 'required|string|max:191|',      //must be entered, a string max char. total of 191
            'address' => 'required|string|max:191|',   
            'phone' => 'numeric|nullable',              //must be numeric, can be empty
            'email' => 'required|email',                //must be entered, formatted as an email
            'insurance' => 'string|nullable'            //must be a string, can be empty
        ]);

        // Create Patient
        $patient = new Patient;
        $patient->name = $request->input('name');
        $patient->address = $request->input('address');
        $patient->phone = $request->input('phone');
        $patient->email = $request->input('email');
        $patient->insurance = $request->input('insurance');
        $patient->save();
        
        // return to patients index with success message
        return redirect('/patients')->with('success', 'Patient added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  
        // to create object of viewed Patient
        $patient = Patient::find($id);
        // to go to view and reference the object with patient information for use in view
        return view('patients.show')->with('patient', $patient);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('patients.edit')->with('patient', $patient);
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
            'name' => 'required|string|max:191|',      //must be entered, a string max char. total of 191
            'address' => 'required|string|max:191|',   
            'phone' => 'numeric|nullable',              //must be numeric, can be empty
            'email' => 'required|email',                //must be entered, formatted as an email
            'insurance' => 'string|nullable'            //must be a string, can be empty
        ]);

        // Create Patient
        $patient = Patient::find($id);
        $patient->name = $request->input('name');
        $patient->address = $request->input('address');
        $patient->phone = $request->input('phone');
        $patient->email = $request->input('email');
        $patient->insurance = $request->input('insurance');
        $patient->save();
        
        // return to patient show page with success message
        return redirect('/patients/'.$patient->id)->with('success', 'Patient updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $visits = Visit::all()->where('patient_id', $id);

        if(count($visits) > 0) {
            session()->flash('danger', 'You cannot remove a patient who has visits scheduled.');
        }
        else {
            session()->flash('success', 'Patient removed successfully.');
            $patient->delete();
        }

        // return to patients index page
        return redirect('/patients');
    }
}
