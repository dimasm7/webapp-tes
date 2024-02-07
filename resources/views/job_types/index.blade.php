@extends('layouts.app')
@section('contents')
    @if (session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
    @endif
    <a class="btn btn-sm btn-primary btn-uppercase mb-4" href="{{route('job-types.create')}}">
        Create
    </a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobTypes as $jobType)
                    <tr>
                        <td>{{ $jobType->name }}</td>
                        <td>{{ $jobType->desc }}</td>
                        <td>{{ $jobType->status }}</td>
                        <td>
                            @include('job_types.action', $jobType)
                        </td>
                    </tr>
                @endforeach
                @if (count($jobTypes) < 1)
                    <tr>
                        <td colspan='5' align='center'>No Data Found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
@endsection