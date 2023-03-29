<?php

namespace App\Http\Controllers;

use App\Http\Requests\AppoimentRequest;
use App\Models\Appoiment;
use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;

class AppoimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appoiments = Appoiment::all();
        return view('admin.appoiments.index', compact('appoiments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();
        $doctors = Doctor::all();

        return view('admin.appoiments.create', compact('services', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppoimentRequest $request)
    {
        $appoiment = new Appoiment();
        $appoiment->name = $request->get('name');
        $appoiment->email = $request->get('email');
        $appoiment->appointment_date = $request->get('appointment_date');
        $appoiment->appointment_time = $request->get('appointment_time');
        $appoiment->service_id = $request->get('service_id');
        $appoiment->doctor_id = $request->get('doctor_id');

        $saved = $appoiment->save();
        if ($saved) {
            session()->flash('success', 'Doctor Created Succesfuly');
            return redirect()->route('appoiments.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appoiment  $appoiment
     * @return \Illuminate\Http\Response
     */
    public function show(Appoiment $appoiment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Appoiment  $appoiment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $appoiment = Appoiment::find($id);
        $services = Service::all();
        $doctors = Doctor::all();
        return view('admin.appoiments.edit', compact('appoiment', 'services', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Appoiment  $appoiment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $appoiment = Appoiment::find($id);
        $appoiment->update([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'appointment_date' => $request->get('appointment_date'),
            'appointment_time' => $request->get('appointment_time'),
            'service_id' => $request->get('service_id'),
            'doctor_id' => $request->get('doctor_id'),


        ]);
        $saved = $appoiment->save();
        if ($saved) {
            session()->flash('success', 'Service Updated Succesfuly');
            return redirect()->route('appoiments.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appoiment  $appoiment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appoiment $appoiment)
    {
        $deleted = $appoiment->delete();

        if ($deleted) {
            session()->flash('danger', 'Service Deleted Succesfuly');
            return redirect()->route('appoiments.index');
        }
    }
}
