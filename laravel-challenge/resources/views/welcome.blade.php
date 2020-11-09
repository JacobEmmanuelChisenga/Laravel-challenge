@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="jumbotron text-center">
            <h3>Welcome</h3>
            <h3 class="text-center">In Order For You To Manage Companies and Employees</h3>
            <p class="text-center lead">You will need to login first</p>
            <a href="{{ route('login') }}" class="btn btn-lg btn-primary">Go to login page</a>
        </div>
    </div>
</div>
@endsection