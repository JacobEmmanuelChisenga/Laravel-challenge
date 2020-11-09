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
                    <li class="breadcrumb-item active"><a href="{{ route('create') }}">Create New Company</a></li>
                </ol>
            </nav>
            <hr>
            @include('layouts.message')

            @if($companies->isEmpty())
            <h2 class="text-center">No company records available</h2>
            @else
            <div class="container">
                <h2 class="text-center">The Company Records</h2>
                <table class="table table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Website</th>
                        <th>Logo</th>
                        <th colspan="2" class="text-center">Action</th>
                    </thead>
                    <?php $i = 0;?>
                    @foreach($companies as $company)
                    <tr>
                    <td>{{$i+=1}}</td>
                        <td>
                            <a href="{{ route('company.show', ['id' => $company->id]) }}">
                                {{ $company->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('company.show', ['id' => $company->id]) }}">
                                {{ $company->email }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('company.show', ['id' => $company->id]) }}">
                                {{ $company->website }}
                            </a>
                        </td>
                        <td class="text-center">
                            <img src="{{ App\Models\File::getUrl($company->logo) }}" alt="" class="img-fluid" width="55">
                        </td>
                        <!-- {{App\Models\File::getUrl($company->logo)}} -->
                        <td class="text-center">
                            <a href="{{ route('company.edit', ['id' => $company->id]) }}" class="btn btn-sm btn-success">
                                Edit
                            </a>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('company.deletecompany', ['id' => $company->id]) }}" class="btn btn-sm btn-danger">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </table>
                <p>{{$companies -> links()}}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection