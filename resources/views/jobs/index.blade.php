@extends('layouts.app')
@section('contents')
    @if (session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
    @endif
    <a class="btn btn-sm btn-primary btn-uppercase mb-4" href="{{route('jobs.create')}}">
        Create
    </a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Type</th>
                    <th scope="col">Name</th>
                    <th scope="col">Desc</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{ @$job->job_types->name }}</td>
                        <td>{{ $job->name }}</td>
                        <td>{{ $job->desc }}</td>
                        <td>{{ $job->status }}</td>
                        <td>
                            @include('jobs.action', $job)
                        </td>
                    </tr>
                @endforeach
                @if (count($jobs) < 1)
                    <tr>
                        <td colspan='5' align='center'>No Data Found!</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <a class="btn btn-sm btn-secondary btn-uppercase mt-4" href="{{route('home')}}">
        Back
    </a>
@endsection