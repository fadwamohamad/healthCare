<?php

namespace App\Http\Controllers;

use App\Models\disease;
use App\Http\Requests\StorediseaseRequest;
use App\Http\Requests\UpdatediseaseRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiseaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diseases = Disease::all();
        return view('disease.allDiseases', compact('diseases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('disease.addDisease');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorediseaseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $disease = new  Disease;
        $disease->disease_name = $request->disease_name;
        $disease->patient_id = Auth::guard('patient')->id();
        $disease->disease_description = $request->disease_description;
        $disease->save();

        return redirect('disease/all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function show(disease $disease)
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
        $disease = Disease::where('id', $id)->first();

        return view('disease.editDisease', compact('disease'));
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
        $disease = Disease::find($request->disease_id);

        $disease->disease_name = $request->disease_name;
        $disease->disease_description = $request->disease_description;

        $disease->save();
        return redirect('disease/all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\disease  $disease
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disease = Disease::find($id);

        $disease->delete();

        return redirect('disease/all');
    }
}
