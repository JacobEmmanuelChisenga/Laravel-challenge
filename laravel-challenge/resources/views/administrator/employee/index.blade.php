@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('home') }}" class="btn btn-lg btn-info custom-group-btn" style="margin-right: 10px;">Dashboard</a>
            <a href="/create" class="btn btn-lg btn-success custom-group-btn" style="margin-right: 10px;">Create New Company</a>
          </div> -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('employee.create') }}">Create Employee
                            Record</a></li>
                </ol>
            </nav>
            <hr>
            @include('layouts.message')

            @if($employees->isEmpty())
            <h2 class="text-center">No Employee records available</h2>
            @else
            <div class="container">
                <h2 class="text-center">The Company Records</h2>
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th colspan="2" class="text-center">Action</th>
                    </thead>
                    <?php $i = 0;?>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{$i+=1}}</td>
                        <td>
                            <a href="{{ route('employee.show', ['id' => $employee->id]) }}">
                                {{ $employee->firstname }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('employee.show', ['id' => $employee->id]) }}">
                                {{ $employee->lastname }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('employee.show', ['id' => $employee->id]) }}">
                              {{ $employee->company()->first()->name }} 
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('employee.show', ['id' => $employee->id]) }}">
                                {{ $employee->email }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('employee.show', ['id' => $employee->id]) }}">
                                {{ $employee->phone }}
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('employee.edit', ['id' => $employee->id]) }}"
                                class="btn btn-sm btn-success">
                                Edit
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('employee.deletecompany', ['id' => $employee->id]) }}"
                                class="btn btn-sm btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <p>{{$employees -> links()}}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection