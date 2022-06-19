<?php

namespace App\Http\Controllers;

use App\Models\patient;
use App\Models\doctor;
use App\Http\Requests\StorepatientRequest;
use App\Http\Requests\UpdatepatientRequest;
use App\Models\appointment;
use App\Models\disease;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $doctors = Doctor::all();
        $diseases = Disease::all();
        $appointments = Appointment::all();
        $patients = Patient::all();
        return view('patient.allPatients', compact('patients', 'doctors', 'diseases', 'appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepatientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $file_extension = $request->photo_patient->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;

        $path = 'images/patient_media';

        $request->photo_patient->move($path, $file_name);


        $patient = new  Patient;
        $patient->full_name = $request->full_name;
        $patient->patientPhone = $request->patientPhone;
        $patient->patientEmail = $request->patientEmail;
        $patient->doc_patient = $request->doc_patient;
        $patient->dis_patient = $request->dis_patient;
        $patient->app_patient = $request->app_patient;
        $patient->photo_patient = $file_name;
        $patient->patient_description = $request->patient_description;
        $patient->save();

        return redirect('patient/all');
        // return $patient;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = Patient::where('id', $id)->first();
        $doctors = Doctor::all();
        $diseases = Disease::all();
        $appointments = Appointment::all();
        return view('patient.editPatient', compact('patient', 'doctors', 'diseases', 'appointments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedoctorRequest  $request
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $patient = Patient::find($request->doctor_id);
        $file_extension = $request->photo_patient->getClientOriginalExtension();
        $file_name = time() . '.' . $file_extension;

        $path = 'images/patient_media';

        $request->photo_patient->move($path, $file_name);


        $patient->full_name = $request->full_name;
        $patient->id_number = $request->id_number;
        $patient->doc_patient = $request->doc_patient;
        $patient->dis_patient = $request->dis_patient;
        $patient->app_patient = $request->app_patient;
        $patient->photo_patient = $file_name;
        $patient->save();


        return redirect('patient/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);

        $patient->delete();

        return redirect('patient/all');
    }
    public function  showAuth(){
        return view('patient.login');
    }
    public  function  login(Request $request){
        $credentials = $request->except(['_token']);

        if(Auth::guard('patient')->attempt($credentials))
        {
            return redirect(RouteServiceProvider::Patient);
        }
        return  redirect()->back();
    }
    public  function logout(){
        Auth::guard('patient')->logout();
        return redirect()->route('patient.login');
    }
    public  function  register(Request $request){

        patient::create([
           'name' =>$request->name,
           'email' =>$request->email,
           'password' =>bcrypt($request->password)
        ]);
        return  redirect()->route('patient.login');
    }
    public  function  showRegister(){
        return view('patient.register');
    }
}
