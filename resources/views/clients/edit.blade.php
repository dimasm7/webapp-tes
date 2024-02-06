@extends('layouts.app')
@section('contents')
  <h4>Edit</h4>
  @if ($errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </div>
  @endif
  <form action="{{route('clients.update', $client->id)}}" method="post">
    @csrf
    @method('patch')
    @include('clients.field', $client)
    <div class="mt-4">
      <button class="btn btn-primary" type="submit">Save</button>
      <a href="{!! route('clients.index') !!}" class="btn btn-secondary">Back</a>
    </div>
  </form>
@endsection