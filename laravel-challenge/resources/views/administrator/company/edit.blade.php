@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update Company Records') }}</div>
                <br>
                <div class="card-body">
                    <form action="{{ route('company.update', ['id' => $company->id])}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="name" id="name" name="name"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Company Name">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" id="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Enter email">
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Website</label>
                            <input type="text" name="website" class="form-control" placeholder="Company Website">
                        </div>
                        <!-- <div class="form-group">
                        <label for="exampleFormControlFile1">Company Logo</label>
                        <input type="file" name="logo" class="form-control-file" id="exampleFormControlFile1">
                     </div> -->

                        <button type="submit" class="btn btn-primary">Save Company Record</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection