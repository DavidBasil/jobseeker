@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">

      <div class="company-profile">
        @if (!empty($company->cover_photo))
          <img src="{{ asset('uploads/coverphoto') }}/{{$company->cover_photo}}" class="w-100 ml-3" alt="">
        @else
          <img src="{{ asset('cover/cover.png') }}" class="w-100 ml-3" alt="">
        @endif
      </div>

      <div class="company-desc mt-4">
        <h2 class="mb-3">{{ $company->cname }}</h2>
        <div class="jumbotron p-2 rounded">
          <p>{{ $company->description }}</p>
        </div>

        <ul class="list-group list-group-horizontal">
          <li class="list-group-item shadow-lg"><em>"{{ $company->slogan }}"</em></li>
          <li class="list-group-item shadow-lg"><i class="fas fa-map-marker"></i> {{ $company->address }}</li>
          <li class="list-group-item shadow-lg"><i class="fas fa-phone"></i> {{ $company->phone }}</li>
        </ul>

        @if (!empty($company->logo))
          <img src="{{ asset('uploads/logo') }}/{{ $company->logo }}" alt="" class="w-25 mt-4">  
        @else
          <img src="{{ asset('avatar/man.jpg') }}" alt="" class="w-25">
        @endif
      </div>

    </div>

    <hr>

    <h4 class="my-5">Company's jobs</h4>

    <ul class="list-group-flush">
        @foreach ($company->jobs as $job)
          <li class="list-group-item py-4">
          <span class="border-right border-danger pr-2 font-weight-bold">{{ $job->position }}</span>
          <span class="border-right border-danger pr-2 pl-1"><i class="fa fa-clock"></i> {{ $job->type }}</span>
          <span><i class="fa fa-map-marker"></i> {{ Str::limit($job->address, 30) }}</span>
              <span class="float-right"><a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" class="btn btn-outline-primary py-1">View</a></span>
          </li>
        @endforeach
    </ul>

  </div>
@endsection
