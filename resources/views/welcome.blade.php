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
                <img src="{{ asset('avatar/man.jpg') }}" width="80" alt="">
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
  </div>
@endsection
