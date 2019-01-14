<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import Models for Doctor and Visit
use App\Doctor;
use App\Visit;

class DoctorsController extends Controller
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
        // Variable storing all doctors pulled from the database, ordered by id
        $doctors = Doctor::orderBy('id', 'asc')->get();
        return view('doctors.index')->with('doctors', $doctors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
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
            'start_date' => 'required'
        ]);

        // Create Doctor
        $doctor = new Doctor;
        $doctor->name = $request->input('name');
        $doctor->address = $request->input('address');
        $doctor->phone = $request->input('phone');
        $doctor->email = $request->input('email');
        $doctor->start_date = $request->input('start_date');
        $doctor->start_date = date('Y-m-d', strtotime($doctor->start_date));
        $doctor->save();
        
        // return to doctors index with success message
        return redirect('/doctors')->with('success', 'Doctor added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // to create object of viewed Doctor
        $doctor = Doctor::find($id);
        // to go to view and reference the object with doctor information for use in view
        return view('doctors.show')->with('doctor', $doctor);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.edit')->with('doctor', $doctor);
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
            'start_date' => 'required'
        ]);

        // Create Doctor
        $doctor = Doctor::find($id);
        $doctor->name = $request->input('name');
        $doctor->address = $request->input('address');
        $doctor->phone = $request->input('phone');
        $doctor->email = $request->input('email');
        $doctor->start_date = $request->input('start_date');
        $doctor->start_date = date('Y-m-d', strtotime($doctor->start_date));
        $doctor->save();
        
        // return to doctors index with success message
        return redirect('/doctors/'.$doctor->id)->with('success', 'Doctor updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $visits = Visit::all()->where('doctor_id', $id);

        // If the doctor has visits, do not allow to delete
        if(count($visits) > 0) {
            session()->flash('danger', 'You cannot remove a doctor who has visits scheduled.');
        }
        // If the doctor does not have visits, delete
        else {
            session()->flash('success', 'Doctor removed successfully.');
            $doctor->delete();
        }

        // return to doctors index page
        return redirect('/doctors');
    }
}
