@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ $job->title }}</div>
        <div class="card-body">
          <h3>Description</h3>
          <p>{{ $job->description }}</p>
          <h3>Duties</h3>
          <p>{{ $job->roles }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">short info</div>
        <div class="card-body">
          <p>Company: <a href="{{ route('company.show', [$job->company->id, $job->company->slug]) }}">{{ $job->company->cname }}</a></p>
          <p>Employment type: {{ $job->type }}</p>
          <p>Position: {{ $job->position }}</p>
          <p>Added: {{ $job->created_at->diffForHumans() }}</p>
          <p>Last Date: {{ date('F d, Y', strtotime($job->last_date))}}</p>
        </div>
      </div>

      @if (Auth::check() && Auth::user()->user_type='seeker')
        <form action="{{ route('apply', [$job->id]) }}" method="post">
          @csrf
          @if (session('message'))
          <div class="alert alert-success mt-2">
            <p>{{ session('message') }}</p>
          </div> 
          @endif
          @if ($job->checkApply())
          <button type="submit" class="btn btn-success btn-block mt-2" disabled>Applied</button>
          @else
          <button type="submit" class="btn btn-success btn-block mt-2">Apply</button>
          @endif
        </form>
      @endif

    </div>
  </div>
</div>

@endsection
