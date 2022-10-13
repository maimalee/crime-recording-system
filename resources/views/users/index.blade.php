@extends('layouts.app')
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-white text-uppercase d-flex justify-content-between">
                    <div class="mt-1  text-uppercase font-weight-bold">Records</div>
                    <a href="{{route('record.create')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-plus-circle"></i> Add Record
                    </a>
                </div>
            </div>

            <div class="card mt-1 mb-5">
                <div class="card-body">
                    <div class="table-responsive table-responsive-md">
                        <table id="records" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>ID#</th>
                                <th>Phone</th>
                                <th>Name</th>
                                <th>Created At</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('table#records').DataTable({
            serverSide: true,
            processing: true,
            ajax: '/api/users',
            pageLength: 100,
            fnCreatedRow (tr, data, index) {
                tr.addEventListener('click', function (e) {
                    window.location.href = `/users/${data['id']}`
                })
            },
            columns: [
                {data: 'id'},
                {data: 'phone'},
                {data: 'name'},
                {data: 'created_at'},
            ]
        })
    </script>
@endsection
