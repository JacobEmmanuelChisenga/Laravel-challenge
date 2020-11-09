@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center" style="margin-top: 30px;">Update Employee Record</h2>
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="{{ route('employee.update', ['id' => $employee->id]) }}" method="post">
            @csrf
            @method('put') 
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="">First Name</label>
                        <input type="text" class="form-control" name="firstname" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="">Last Name</label>
                        <input type="text" class="form-control" name="lastname" placeholder="">
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
                       <input type="email" class="form-control" name="email" placeholder ="" >
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                    <label for="">Phone Number</label>
                        <input type="number" class="form-control" name="phone"placeholder="">
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