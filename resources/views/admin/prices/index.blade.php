@extends('admin.layout')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card-header">
            <h2 class="fw-bold py-1 mb-1"> Prices</h2>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('prices.create') }}" class="btn btn-primary float-end">Create</a>

                    <h3 class="card-title">Prices List</h3>

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
                                <th>Image</th>
                                <th>price</th>
                                <th>Created Data</th>
                                <th>Updated Data</th>
                                <th>Action</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $price)
                                <tr>

                                    <td>{{ $price->id }}</td>

                                    <td>{{ $price->service->name }}</td>
                                    <td>
                                        <ul class="d-flex align-items-center">
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                                class=" pull-up" title=""
                                                data-bs-original-title="{{ $price->name }}">
                                                <img src="{{ Storage::url('prices/' . $price->image) }}" alt=""
                                                    class="rounded-circle" width="60px" height="60px">
                                            </li>
                                        </ul>
                                    </td>

                                    <td>
                                        {{ $price->price }}
                                    </td>
                                   

                                    <td>{{ $price->created_at }}</td>

                                    <td>{{ $price->updated_at }}</td>

                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('prices.edit', $price->id) }}" class="btn btn-info"><i
                                                    class='bx bx-edit-alt'></i></a>
                                            <form action="{{ route('prices.destroy', $price->id) }}" method="POST">
                                                @csrf
                                                @method('delete')

                                                <button type="submit" class="btn btn-danger"> <i
                                                        class='bx bx-trash-alt'></i></button>
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
