@extends('layouts.app')
@section('contents')
    <div class="container pt-5">
        <div class="form-group">
            <label>Name:</label>
            <p>{!! $client->name !!}</p>
        </div>
        <div class="form-group">
            <label>Email:</label>
            <p>{!! $client->email !!}</p>
        </div>
        <div class="form-group">
            <label>Phone:</label>
            <p>{!! $client->phone !!}</p>
        </div>
        <div class="form-group">
            <label>Address:</label>
            <p>{!! $client->address !!}</p>
        </div>
        <div class="form-group">
            <label>Created At:</label>
            <p>{!! $client->created_at !!}</p>
        </div>
        <a href="{!! route('clients.index') !!}" class="btn btn-secondary">Back</a>
    </div>
@endsection