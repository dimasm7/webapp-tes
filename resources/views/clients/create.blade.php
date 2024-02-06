@extends('layouts.app')
@section('contents')
  <h4>Create</h4>
  @if ($errors->any())
    <div class="alert alert-danger">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </div>
  @endif
  <form action="{{route('clients.store')}}" method="post">
    @csrf
    @include('clients.field')
    <div class="mt-4">
      <button class="btn btn-primary" type="submit">Submit</button>
      <a href="{!! route('clients.index') !!}" class="btn btn-secondary">Back</a>
    </div>
  </form>
@endsection