@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div class="card-header">{{ $job->title }}</div>
        <div class="card-body">
          <h3>Description</h3>
          <p>{{ $job->description }}</p>
          <h3>Duties</h3>
          <p>{{ $job->roles }}</p>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card-header">short info</div>
        <div class="card-body">
          <p>Company: {{ $job->company->cname }}</p>
          <p>Employment type: {{ $job->type }}</p>
          <p>Position: {{ $job->position }}</p>
          <p>Date: {{ $job->created_at->diffForHumans() }}</p>
        </div>
        <button class="btn btn-success btn-block">Apply</button>
      </div>
    </div>
  </div>
@endsection
