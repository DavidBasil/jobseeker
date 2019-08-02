@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <h2>Recent Jobs</h2>

      <div class="row">
        <div class="col-md-12">
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
        </div>
      </div>

      <table class="table">
        <tbody>
          @foreach ($jobs as $job)
            <tr>
              <td>
                <img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" width="80" alt="">
              </td>
              <td>position: {{ $job->position }}
                <br>
                <i class="fa fa-clock"></i> {{ $job->type }}
              </td>
              <td><i class="fa fa-map-marker"></i> {{ $job->address }}</td>
              <td><i class="fa fa-globe"></i> {{ $job->created_at->diffForHumans() }}</td>
              <td>
                <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}">Apply</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div>
      <a href="{{ route('alljobs') }}" class="btn btn-success btn-block">Browse all jobs</a>
    </div>

  </div>

  <hr>

  <!-- featured companies -->
  <div class="container mt-4">
    <h2>Featured Companies</h2>
    <div class="row">
    @foreach ($companies as $company)
      <div class="col-md-4 mb-2">
        <div class="card">
          <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" alt="" class="card-img-top w-75 mx-auto">
          <div class="card-body">
            <h5 class="card-title">{{ $company->cname }}</h5>
            <p class="card-text">{{ Str::limit($company->description, 25) }}</p>
            <a href="{{ route('company.show', [$company->id, $company->slug]) }}" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>

@endsection
