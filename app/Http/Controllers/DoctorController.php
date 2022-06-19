<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Models\doctor;
use App\Http\Requests\StoredoctorRequest;
use App\Http\Requests\UpdatedoctorRequest;
use App\Mail\TestMail;
use App\Models\doctorSpecialty;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('doctor.allDoctors', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Specialties = doctorSpecialty::all();
        return view('doctor.addDoctor', compact('Specialties'));
    }
    public function  showAuth(){
        return view('doctor.login');
    }
    public  function  login(Request $request){
        $credentials = $request->except(['_token']);

        if(Auth::guard('doctor')->attempt($credentials))
        {
            return redirect(RouteServiceProvider::DOCTOR);
        }
        return  redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredoctorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = new  Doctor;
        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->specialty_id = $request->specialty_id;
        $doctor->password = bcrypt( $request->password);
        $doctor->save();

        return redirect('doctor/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(doctor $doctor)
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
        $doctor = Doctor::where('id', $id)->first();

        return view('doctor.editDoctor', compact('doctor'));
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
        $doctor = Doctor::find($request->doctor_id);

        $doctor->first_name = $request->first_name;
        $doctor->last_name = $request->last_name;
        $doctor->phone = $request->phone;
        $doctor->doctor_password = $request->doctor_password;
        $doctor->save();

        return redirect('doctor/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        $doctor->delete();

        return redirect('doctor/all');
    }


    public function activate($id)
    {
        $doctor = Doctor::find($id)->update([
            'activateDoctor' =>1
        ]);


        // return $doctor;
         return redirect('doctor/all');
    }
    public  function  patient(){
        $id =Auth::guard('doctor')->id();
        $patients = appointment::with('patients')->where('doctor_id', Auth::guard('doctor')->id())->get()->pluck('patients');

   return view('doctor.patient',compact('patients'));


    }
    public  function  appointment($id){
     $appointments=   appointment::where('patient_id',$id)->get();
     return view('doctor.appointment', compact('appointments'));
    }
    public  function logout(){
        Auth::guard('doctor')->logout();
        return redirect()->route('doctor.login');
    }
}
