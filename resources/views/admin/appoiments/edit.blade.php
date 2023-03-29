@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Edit Doctors</h4>
<form action="{{route('doctors.update',$doctor->id)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
            @csrf
            @if ($errors->any())

            <div class="alert alert-danger" role="alert">  
                 @foreach($errors->all() as $errors)
                {{$errors}}
                @endforeach
            </div>



            @endif
        <div class="row">
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Edit Category</h5>
                        <small class="text-muted float-end">Edit Category</small>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="basic-default-name"
                                        placeholder="Enter Your Name" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="basic-default-name"
                                        placeholder="Enter Your Email" value="{{old('email')}}">
                                </div>
                            </div>

                            
                            <div class="row mb-3">
                                <label for="defaultSelect" class="col-sm-2 col-form-label">Choose Service</label>
                                <div class="col-sm-10">
                                <select id="defaultSelect" class="form-select" name="service_id">
                                @foreach($services as $service)
                                  <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach

                                </select>
                                </div>
                              </div>

                              <div class="row mb-3">
                                <label for="defaultSelect" class="col-sm-2 col-form-label">Choose Doctor</label>
                                <div class="col-sm-10">
                                <select id="defaultSelect" class="form-select" name="doctor_id">
                                @foreach($doctors as $doctor)
                                  <option value="{{$doctor->id}}">{{$doctor->name}}</option>
                                @endforeach

                                </select>
                                </div>
                              </div>

                              <div class="mb-3 row">
                                <label for="html5-date-input" class="col-md-2 col-form-label">Date</label>
                                <div class="col-md-10">
                                  <input class="form-control" type="date" name="appoiment_date" value="2021-06-18" id="html5-date-input">
                                </div>
                              </div>
                              <div class="mb-3 row">
                                <label for="html5-time-input" class="col-md-2 col-form-label">Time</label>
                                <div class="col-md-10">
                                  <input class="form-control" type="time" name="appoiment_date" value="12:30:00" id="html5-time-input">
                                </div>
                              </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
