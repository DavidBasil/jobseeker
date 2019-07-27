@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="company-profile">
        <img src="{{ asset('cover/cover.png') }}" class="w-100" alt="">
      </div>
      <div class="company-desc mt-2">
        <h2>{{ $company->cname }}</h2>
        <p>{{ $company->description }}</p>
        <p>Slogan: {{ $company->slogan }} | Address: {{ $company->address }} | Phone: {{ $company->phone }} |  Website: {{ $company->website }}</p>
        <img src="{{ asset('avatar/man.jpg') }}" class="w-25" alt="">
      </div>
    </div>

    <hr>

    <h4 class="mt-4">Company's jobs</h4>

    <table class="table">
      <tbody>
        @foreach ($company->jobs as $job)
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
@endsection
