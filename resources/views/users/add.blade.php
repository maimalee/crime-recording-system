@extends('layouts.app')
@section('content')
    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-white text-uppercase d-flex justify-content-between">
                    <div class="mt-1  text-uppercase font-weight-bold">Add New Record</div>
                </div>
            </div>

            <div class="card mt-1">
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="text-muted mb-0">Full Name:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" placeholder="Full name" value="{{old('name')}}">

                            @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address" class="text-muted mb-0">Full Address:</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                   name="address" placeholder="Address" value="{{old('address')}}">

                            @error('name')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone" class="text-muted mb-0">Phone Number:</label>
                            <input type="phone" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone"
                                   value="{{old('phone')}}">

                            @error('phone')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title" class="text-muted mb-0">Title:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Title"
                                   value="{{old('title')}}">

                            @error('title')
                            <span class="invalid-feedback">{{$message}}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="case-desc">Case Description:</label>
                            <textarea name="case-desc" id="case-desc" cols="30" rows="10"></textarea>
                        </div>

                        <div class="text-right">
                            <button class="btn btn-primary">Create Record</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
