@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"> Create Prices</h4>
<form action="{{route('prices.store')}}" method="POST" enctype="multipart/form-data">
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
                        <h5 class="mb-0">Create Prices</h5>
                        <small class="text-muted float-end">Create Prices</small>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row mb-3">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Price</label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control" name="price" placeholder="000$" aria-label="Amount (to the nearest dollar)">
                                  </div>
                                </div>
                                </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-company">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="image" id="basic-default-company"
                                        placeholder="ACME Inc.">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="defaultSelect" class="col-sm-2 col-form-label">Choose Service Name</label>
                                <div class="col-sm-10">
                                <select id="defaultSelect" class="form-select" name="service_id">
                                @foreach($services as $service)
                                  <option value="{{$service->id}}">{{$service->name}}</option>
                                @endforeach

                                </select>
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
