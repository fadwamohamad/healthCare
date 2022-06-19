<?php

namespace App\Http\Controllers;

use App\Models\appointment;
use App\Http\Requests\StoreappointmentRequest;
use App\Http\Requests\UpdateappointmentRequest;
use App\Models\doctor;
use App\Models\patient;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $appointments = Appointment::all();
        return view('appointment.allAppointments', compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $patients = patient::all();
        $doctors= doctor::all();
        return view('appointment.addAppointment', compact('patients','doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreappointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $appointment = new  Appointment;
        $appointment->appointment_name = $request->appointment_name;
        $appointment->patient_id = $request->patient_id;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->available_appointment_time = $request->available_appointment_time;
        $appointment->save();

        return redirect('appointment/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appointment = Appointment::where('id', $id)->first();

        return view('appointment.editAppointment', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatediseaseRequest  $request
     * @param  \App\Models\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $appointment = Appointment::find($request->appointment_id);

        $appointment->appointment_name = $request->appointment_name;
        $appointment->available_appointment_time = $request->available_appointment_time;
        $appointment->save();
        return redirect('appointment/all');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $appointment = Appointment::find($id);

        $appointment->delete();

        return redirect('appointment/all');
    }
}
