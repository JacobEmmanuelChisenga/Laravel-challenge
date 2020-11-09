@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center" style="margin-top: 30px;">Add Employee Record</h2>
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{ route('employee.store') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="firstname">First name </label>
                        <input type="text" id="firstname" class="form-control @error('firstname') is-invalid @enderror"
                            name="firstname">
                        @error('firstname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lastname">Last name </label>
                        <input type="text" id="name"
                            class="form-control form-control @error('lastname') is-invalid @enderror" name="lastname">
                        @error('lastname')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <!-- <input type="text" class="form-control" name="company" placeholder="Company *"> -->
                        <label for="">Company</label>
                        <select class="form-control" name="company">
                            <option value=""></option>
                            @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <input type="number" class="form-control" name="phone" placeholder="phone number *">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12 text-center">
                        <button type="submit" class="btn p-1 btn-primary"><i class="fas fa-paper-plane"></i>
                            Save Employee</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection