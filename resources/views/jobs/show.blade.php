@extends('layouts.app')
@section('contents')
    <div class="container pt-5">
        <div class="form-group">
            <label>Type:</label>
            <p>{!! @$job->job_types->name !!}</p>
        </div>
        <div class="form-group">
            <label>Name:</label>
            <p>{!! $job->name !!}</p>
        </div>
        <div class="form-group">
            <label>Description:</label>
            <p>{!! $job->desc !!}</p>
        </div>
        <div class="form-group">
            <label>Status:</label>
            <p>{!! $job->status !!}</p>
        </div>
        <div class="form-group">
            <label>Created At:</label>
            <p>{!! $job->created_at !!}</p>
        </div>
        <a href="{!! route('jobs.index') !!}" class="btn btn-secondary">Back</a>
    </div>
@endsection