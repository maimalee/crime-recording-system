@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white text-uppercase d-flex justify-content-between">
                    <div class="mt-1  text-uppercase font-weight-bold">Update user information</div>
                </div>
            </div>

            <div class="mb-1 mt-3">
                <a href="{{route('users.view', $record['id'])}}" class="btn btn-primary btn-sm">
                    <i class="fa fa-chevron-left"></i> Record Info
                </a>
            </div>
            <div class="card mt-1">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="text-muted mb-0">Full Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" placeholder="Full name" value="{{old('name', $record['name'])}}">

                            @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone" class="text-muted mb-0">Phone:</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone number"
                                   value="{{old('phone', $record['phone'])}}">

                            @error('phone')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="address" class="text-muted mb-0">Phone:</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address"
                                   value="{{old('address', $record['address'])}}">

                            @error('address')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button class="btn btn-primary">Update User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
