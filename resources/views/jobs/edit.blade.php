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
  <form action="{{route('jobs.update', $job->id)}}" method="post">
    @csrf
    @method('patch')
    @include('jobs.field', $job)
    <div class="mt-4">
      <button class="btn btn-primary" type="submit">Save</button>
      <a href="{!! route('jobs.index') !!}" class="btn btn-secondary">Back</a>
    </div>
  </form>
@endsection