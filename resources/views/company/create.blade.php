@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <div class="row">

    <!-- left column -->
    <div class="col-md-3">

      <!-- sessions messages -->
      @if (session('avatar'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('avatar') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      <!-- avatar -->
      <img src="{{ asset('avatar/man.jpg') }}" alt="" class="w-100">

      <!-- avatar form -->
      <form action="{{ route('profile.avatar') }}" class="mt-3" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="avatar">
        @error('avatar')
        <p class="text-danger">{{ $message }}</p>
      @enderror
      <button type="submit" class="btn btn-success btn-block mt-2">update</button>
      </form>

    </div>

    <!-- center column -->
    <div class="col-md-5">

      <!-- session messages -->
      @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('message') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      <div class="card">
        <div class="card-header">Update your company</div>
          <form action="{{ route('company.store') }}" method="post">
            @csrf
            <div class="card-body">

              <div class="form-group">
                <label for="">Address</label>
                @error('address')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="text" name="address" class="form-control" value="{{ Auth::user()->company->address }}">
              </div>

              <div class="form-group">
                <label for="">Phone Number</label>
                @error('phone_number')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="text" name="phone_number" class="form-control" value="{{ Auth::user()->company->phone }}">
              </div>

              <div class="form-group">
                <label for="">Website</label>
                @error('website')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="text" name="website" class="form-control" value="{{ Auth::user()->company->website }}">
              </div>

              <div class="form-group">
                <label for="">Slogan</label>
                @error('slogan')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="text" name="slogan" class="form-control" value="{{ Auth::user()->company->slogan }}">
              </div>

              <div class="form-group">
                <label for="">Description</label>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea name="description" rows="8" class="form-control">{{ Auth::user()->company->description }}</textarea>
              </div>

              <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">Update</button>
              </div>

          </form>
          </div>
      </div>
    </div>

    <!-- right column -->
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">About you</div>
        <div class="card-body">
          <p>Company name: {{ Auth::user()->company->cname }}</p>
          <p>Company address: {{ Auth::user()->company->address }}</p>
          <p>Company phone: {{ Auth::user()->company->phone }}</p>
          <p>Company website: <a href="{{ Auth::user()->company->website }}">{{ Auth::user()->company->website }}</a></p>
          <p>Company slogan: {{ Auth::user()->company->slogan }}</p>
        </div>
      </div>
    </div>

  </div>
</div>
@endsection
