<?php

namespace App\Http\Controllers;

use App\Models\doctorSpecialty;
use App\Http\Requests\StoredoctorSpecialtyRequest;
use App\Http\Requests\UpdatedoctorSpecialtyRequest;
use Illuminate\Http\Request;

class DoctorSpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctorSpecialties = doctorSpecialty::all();
        return view('doctorSpecialty.allDoctorsSpecialty', compact('doctorSpecialties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('doctorSpecialty.addDoctorSpecialty');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoredoctorSpecialtyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctorSpecialty = new  doctorSpecialty;
        $doctorSpecialty->specialty_name = $request->specialty_name;
        $doctorSpecialty->specialty_description = $request->specialty_description;
        $doctorSpecialty->save();

        return redirect('doctorSpecialty/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\doctorSpecialty  $doctorSpecialty
     * @return \Illuminate\Http\Response
     */
    public function show(doctorSpecialty $doctorSpecialty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\doctorSpecialty  $doctorSpecialty
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctorSpecialty = doctorSpecialty::where('id', $id)->first();

        return view('doctorSpecialty.editDoctorSpecialty', compact('doctorSpecialty'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedoctorSpecialtyRequest  $request
     * @param  \App\Models\doctorSpecialty  $doctorSpecialty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $doctorSpecialty = doctorSpecialty::find($request->doctorSpecialty_id);

        $doctorSpecialty = new  doctorSpecialty;
        $doctorSpecialty->specialty_name = $request->specialty_name;
        $doctorSpecialty->specialty_description = $request->specialty_description;
        $doctorSpecialty->save();

        return redirect('doctorSpecialty/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\doctorSpecialty  $doctorSpecialty
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctorSpecialty = doctorSpecialty::find($id);

        $doctorSpecialty->delete();

        return redirect('doctorSpecialty/all');
    }
}
