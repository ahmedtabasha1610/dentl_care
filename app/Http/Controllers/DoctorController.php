<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRequest;
use App\Models\Category;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DoctorController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Doctor::all();
        
       return view('admin.doctors.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.doctors.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $doctor = new Doctor();

        $doctor->name = $request->get('name');
        if($request->has('image')){
            $image = $request->file('image');
            $imagename = time().$doctor->name.'.'.$image->getClientOriginalExtension();
            $request->file('image')->storePubliclyAs('doctors',$imagename,['disk'=>'public']);
            $doctor->image = $imagename;
        }
        $doctor->category_id = $request->get('category_id');

        $saved=$doctor->save();
        if($saved){
            session()->flash('success','Doctor Created Succesfuly');
        return redirect()->route('doctors.index');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        $categories = Category::all();
        return view('admin.doctors.edit',compact('doctor', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->update([
            'name'=>$request->get('name'),
            'category_id'=>$request->get('category_id'),
        ]);
        if($request->has('image')){
            $image = $request->file('image');
            $imagename = time().$doctor->name.'.'.$image->getClientOriginalExtension();
            $request->file('image')->storePubliclyAs('doctors',$imagename,['disk'=>'public']);
            $doctor->image = $imagename;
        }
        $saved=$doctor->save();
        if($saved){
            session()->flash('success','Service Updated Succesfuly');
        return redirect()->route('doctors.index');
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
       Storage::disk('public')->delete("doctors/$doctor->image");
       $deleted = $doctor->delete();

       if($deleted){
        session()->flash('danger','Service Deleted Succesfuly');
    return redirect()->route('doctors.index');
}

    }
}
