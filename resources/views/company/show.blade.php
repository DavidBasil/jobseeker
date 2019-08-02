@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="company-profile">
        @if (!empty($company->cover_photo))
          <img src="{{ asset('uploads/coverphoto') }}/{{$company->cover_photo}}" class="w-100" alt="">
        @else
          <img src="{{ asset('cover/cover.png') }}" class="w-100" alt="">
        @endif
      </div>
      <div class="company-desc mt-2">
        <h2>{{ $company->cname }}</h2>
        <p>{{ $company->description }}</p>
        <p>Slogan: {{ $company->slogan }} | Address: {{ $company->address }} | Phone: {{ $company->phone }} |  Website: {{ $company->website }}</p>
        @if (!empty($company->logo))
          <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" alt="" class="w-25">  
        @else
          <img src="{{ asset('avatar/man.jpg') }}" alt="" class="w-25">
        @endif
      </div>
    </div>

    <hr>

    <h4 class="mt-4">Company's jobs</h4>

    <table class="table">
      <tbody>
        @foreach ($company->jobs as $job)
          <tr>
            <td>
              <!-- logo -->
            </td>
            <td>position: {{ $job->position }}
              <br>
              <i class="fa fa-clock"></i> {{ $job->type }}
            </td>
            <td><i class="fa fa-map-marker"></i> {{ $job->address }}</td>
            <td><i class="fa fa-globe"></i> {{ $job->created_at->diffForHumans() }}</td>
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
