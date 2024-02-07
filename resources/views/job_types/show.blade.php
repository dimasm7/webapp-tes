@extends('layouts.app')
@section('contents')
    <div class="container pt-5">
        <div class="form-group">
            <label>Name:</label>
            <p>{!! $jobType->name !!}</p>
        </div>
        <div class="form-group">
            <label>Description:</label>
            <p>{!! $jobType->desc !!}</p>
        </div>
        <div class="form-group">
            <label>Status:</label>
            <p>{!! $jobType->status !!}</p>
        </div>
        <div class="form-group">
            <label>Created At:</label>
            <p>{!! $jobType->created_at !!}</p>
        </div>
        <a href="{!! route('job-types.index') !!}" class="btn btn-secondary">Back</a>
    </div>
@endsection