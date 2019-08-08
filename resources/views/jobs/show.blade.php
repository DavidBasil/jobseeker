@extends('layouts.app')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bg-dark text-light">{{ $job->title }}</div>
        <div class="card-body">
          <h3><u>Description</u></h3>
          <p>{{ $job->description }}</p>
          <h3><u>Duties</u></h3>
          <p>{{ $job->roles }}</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header text-uppercase bg-dark text-light">short info</div>
        <div class="card-body">
          <p>Company: <a href="{{ route('company.show', [$job->company->id, $job->company->slug]) }}">{{ $job->company->cname }}</a></p>
          <p>Employment type: <span class="font-weight-bold">{{ $job->type }}</span></p>
          <p>Position: <span class="font-weight-bold">{{ $job->position }}</span></p>
          <p>Added: <span class="font-weight-bold">{{ $job->created_at->diffForHumans() }}</span></p>
          <p>Last Date: <span class="font-weight-bold">{{ date('F d, Y', strtotime($job->last_date))}}</span></p>
        </div>
      </div>

      @if (Auth::check() && Auth::user()->user_type='seeker')
        <form action="{{ route('apply', [$job->id]) }}" method="post">
          @csrf
          @if (session('message'))
          <div class="alert alert-danger mt-2 text-center">
            <p>{{ session('message') }}</p>
          </div> 
          @endif
          @if ($job->checkApply())
          <button type="submit" class="btn btn-info btn-block mt-2" disabled>Applied</button>
          @else
          <button type="submit" class="btn btn-info btn-block mt-2">Apply</button>
          @endif
        </form>
        @else
          <div class="alert alert-danger mt-2 text-center">
            <a href="{{ route('login') }}">Login</a> to apply to the job
          </div>
      @endif

    </div>
  </div>
</div>

@endsection
