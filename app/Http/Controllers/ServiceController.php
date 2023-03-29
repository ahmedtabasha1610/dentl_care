<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use League\Flysystem\StorageAttributes;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Service::all();
        
       return view('admin.services.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $service = new Service();

        $service->name = $request->get('name');
        if($request->has('image')){
            $image = $request->file('image');
            $imagename = time().$service->name.'.'.$image->getClientOriginalExtension();
            $request->file('image')->storePubliclyAs('services',$imagename,['disk'=>'public']);
            $service->image = $imagename;
        }
        $service->is_active = $request->has('is_active');

        $saved=$service->save();
        if($saved){
            session()->flash('message','Service Created Succesfuly');
        return redirect()->route('services.index');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, $id)
    {
        $service = Service::find($id);
        $service->update([
            'name'=>$request->get('name'),
            'is_active'=>$request->has('is_active'),
        ]);
        if($request->has('image')){
            $image = $request->file('image');
            $imagename = time().$service->name.'.'.$image->getClientOriginalExtension();
            $request->file('image')->storePubliclyAs('services',$imagename,['disk'=>'public']);
            $service->image = $imagename;
        }
        $saved=$service->save();
        if($saved){
            session()->flash('success','Service Updated Succesfuly');
        return redirect()->route('services.index');
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
       Storage::disk('public')->delete("services/$service->image");
       $deleted = $service->delete();

       if($deleted){
        session()->flash('danger','Service Deleted Succesfuly');
    return redirect()->route('services.index');
}

    }
}
