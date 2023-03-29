@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card-header">
            <h2 class="fw-bold py-1 mb-1"> Appoiments</h2>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('appoiments.create') }}" class="btn btn-primary float-end">Create</a>

                    <h3 class="card-title">Appoiments List</h3>

                    @if (session()->has('success'))
                        <div class="bs-toast toast fade show bg-success " role="alert" aria-live="assertive"
                            aria-atomic="true">
                            <div class="toast-body">
                                {{ session()->get('success') }}
                            </div>
                        </div>
                    @endif

                    @if (session()->has('danger'))
                    <div class="bs-toast toast fade show bg-danger " role="alert" aria-live="assertive"
                        aria-atomic="true">
                        <div class="toast-body">
                            {{ session()->get('danger') }}
                        </div>
                    </div>
                @endif
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Appoiment Date</th>
                                <th>Appoiment Time</th>
                                <th>Service</th>
                                <th>Doctor</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appoiments as $appoiment)
                                <tr>

                                    <td>{{ $appoiment->id }}</td>
                                    <td>{{ $appoiment->name }}</td>
                                    <td>{{ $appoiment->email }}</td>
                                    <td>{{ $appoiment->appointment_date }}</td>
                                    <td>{{ $appoiment->appointment_time }}</td>                                    <td>{{ $appoiment->appointment_time }}</td>
                                    <td>{{ $appoiment->service_id }}</td>
                                    <td>{{ $appoiment->doctor_id }}</td>


                                    <td>
                                        <div class="btn-group">
                                            <a href="{{route('appoiments.edit',$appoiment->id)}}" class="btn btn-info"><i class='bx bx-edit-alt'></i></a>
                                            <form action="{{route('appoiments.destroy',$appoiment->id)}}" method="POST">
                                                @csrf
                                                @method('delete')

                                            <button type="submit" class="btn btn-danger"> <i class='bx bx-trash-alt'></i></button>
                                        </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
            <!-- /.card -->


        </div>
    @endsection
