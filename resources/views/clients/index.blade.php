@extends('layouts.app')
@section('contents')
    @if (session('status'))
        <div class="alert alert-info">
            {{ session('status') }}
        </div>
    @endif
    <a class="btn btn-sm btn-primary btn-uppercase mb-4" href="{{route('clients.create')}}">
        Create
    </a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->address }}</td>
                        <td>
                            @include('clients.action', $client)
                        </td>
                    </tr>
                @endforeach
                @if (count($clients) < 1)
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