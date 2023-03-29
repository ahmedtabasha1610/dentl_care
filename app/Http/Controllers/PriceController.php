<?php

namespace App\Http\Controllers;

use App\Http\Requests\PriceRequest;
use App\Models\Price;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = Price::all();

        return view('admin.prices.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = Service::all();

        return view('admin.prices.create' , compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PriceRequest $request)
    {
        $price = new Price();
        $price->price = $request->get('price');
        if($request->has('image')){
            $image = $request->file('image');
            $imagename = time().$price->name.'.'.$image->getClientOriginalExtension();
            $request->file('image')->storePubliclyAs('prices',$imagename,['disk'=>'public']);
            $price->image = $imagename;
        }
        $price->service_id = $request->get('service_id');

        
        $saved=$price->save();
        if($saved){
            session()->flash('success','Price Created Succesfuly');
        return redirect()->route('prices.index');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = Price::find($id);
        $services = Service::all();
        return view('admin.prices.edit',compact('price', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(PriceRequest $request, $id)
    {
        $price = Price::find($id);
        $price->update([
            'price'=>$request->get('price'),
            'service_id'=>$request->get('service_id'),
        ]);
        if($request->has('image')){
            $image = $request->file('image');
            $imagename = time().$price->name.'.'.$image->getClientOriginalExtension();
            $request->file('image')->storePubliclyAs('prices',$imagename,['disk'=>'public']);
            $price->image = $imagename;
        }
        $saved=$price->save();
        if($saved){
            session()->flash('success','Price Updated Succesfuly');
        return redirect()->route('prices.index');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        Storage::disk('public')->delete("prices/$price->image");
        $deleted = $price->delete();
 
        if($deleted){
         session()->flash('danger','Service Deleted Succesfuly');
     return redirect()->route('prices.index');
 }
    }
}
