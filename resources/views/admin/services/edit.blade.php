@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Edit Service</h4>
<form action="{{route('services.update',$service->id)}}" method="POST" enctype="multipart/form-data">
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
                        <h5 class="mb-0">Edit Service</h5>
                        <small class="text-muted float-end">Create Service</small>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" id="basic-default-name"
                                        placeholder="Enter Your Name" value="{{$service->name}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" id="basic-default-company"
                                        placeholder="ACME Inc.">
                                </div>
                            </div>
                            

                            <div class="form-check form-switch mb-2 ">
                                <input class="form-check-input" type="checkbox" name="is_active" id="flexSwitchCheckChecked" 
                                @if($service->is_active)
                                checked

                                @endif
                                >

                                <label class="form-check-label" for="flexSwitchCheckChecked">ِActivate</label>

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
