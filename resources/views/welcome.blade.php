@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      @if (session('success'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <h2 class="mb-3">Recent Jobs</h2>

      <div class="row">
        <div class="col-md-12">
        </div>
      </div>

      <div class="table-responsive">
        <table class="table table-hover">
          <tbody>
            @foreach ($jobs as $job)
              <tr>
                <td>
                  <img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" width="80" alt="">
                </td>
                <td><small>position:</small> <span class="font-weight-bold">{{ $job->position }}</span>
                  <br>
                  <i class="fa fa-clock"></i> {{ $job->type }}
                </td>
                <td><i class="fa fa-map-marker"></i> {{ $job->address }}</td>
                <td><i class="fa fa-globe"></i> {{ $job->created_at->diffForHumans() }}</td>
                <td>

                  @auth
                    @if (Auth::user()->user_type == 'employer')
                    <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" class="btn btn-outline-primary btn-rounded waves-effect">View</a>
                    @endif
                  @endauth

                  <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" class="btn btn-outline-primary btn-rounded waves-effect">Apply</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>

    <div>
      <a href="{{ route('alljobs') }}" class="btn btn-outline-primary btn-block btn-rounded mt-4">Browse all jobs</a>
    </div>

  </div>

  <hr>

  <!-- featured companies -->
  <div class="container mt-5">
    <h3 class="light-blue-text mb-3">Featured Companies</h3>
    <div class="row">
      @foreach ($companies as $company)
        <div class="col-md-4 mb-2">
          <div class="card h-100 card-body">
            <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" alt="" class="card-img-top w-50 mx-auto">
            <div class="card-body">
              <h5 class="card-title">{{ $company->cname }}</h5>
              <p class="card-text">{{ Str::limit($company->description, 25) }}</p>
              <a href="{{ route('company.show', [$company->id, $company->slug]) }}" class="font-weight-bold text-decoration-none">Read more >></a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  </div>

@endsection
