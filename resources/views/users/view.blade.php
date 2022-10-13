@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-white text-uppercase">User Information</div>
            </div>
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item">
                            <b>Name:</b> {{$record['name']}}
                        </div>

                        <div class="list-group-item">
                            <b>Phone:</b> {{$record['phone']}}
                        </div>
                        <div class="list-group-item">
                            <b>Address:</b> {{$record['address']}}
                        </div>
                        <div class="list-group-item">
                            <b>Created At:</b> {{$record['created_at']}}
                        </div>

                    </div>

                    <div class="mt-2 text-right">
                        <a href="{{Route('record.update', $record['id'])}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a href="{{Route('record.delete', $record['id'])}}" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i> Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-10">
                <div class="card mt-3">
                    <div class="card-header text-uppercase font-weight-bold">User Record</div>
                    <div class="card-body">
                        <div class="table-responsive table-responsive-md">
                            <table id="record" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>ID#</th>
                                    <th>Title</th>
                                    <th>Case Description</th>
                                </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script>
        $('table#record').DataTable({

            serverSide: true,
            processing: true,
            ajax: '/api/users/{{$record['id']}}/records',
            pageLength: 3,
            fnCreatedRow(tr, data, index) {
                tr.addEventListener('click', function (e) {
                    window.location.href = `/users/${data['id']}`
                })
            },
            columns: [
                {data: 'id'},
                {data: 'title'},
                {data: 'case-desc'},
            ]
        });


    </script>
@endsection
