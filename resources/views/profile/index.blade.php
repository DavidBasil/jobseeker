@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">

      <!-- avatar -->
      <div class="col-md-3">
        @if (session('avatar'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('avatar') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        @if (empty(Auth::user()->profile->avatar))
          <img src="{{ asset('avatar/man.jpg') }}" alt="" class="w-75 ml-4">
        @else
          <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avatar }}" alt="" class="w-75">
        @endif
        <!-- avatar form -->
        <form action="{{ route('profile.avatar') }}" class="mt-3" method="post" enctype="multipart/form-data">
          @csrf
          <input type="file" name="avatar">
          @error('avatar')
          <p class="text-danger mt-2">{{ $message }}</p>
          @enderror
          <button type="submit" class="btn btn-info btn-block mt-3 p-1">update</button>
        </form>
      </div>

      <!-- profile info -->
      <div class="col-md-5">
        @if (session('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <div class="card border-light">
          <div class="card-header bg-light border-left-0 border-right-0 text-center font-weight-bold text-uppercase">Update your Profile</div>
          <form action="{{ route('profile.create') }}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="">Address</label>
                @error('address')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="text" name="address" class="form-control" value="{{ Auth::user()->profile->address }}">
              </div>
              <div class="form-group">
                <label for="">Phone Number</label>
                @error('phone_number')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <input type="text" name="phone_number" class="form-control" value="{{ Auth::user()->profile->phone_number }}">
              </div>
              <div class="form-group">
                <label for="">Experience</label>
                @error('experience')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <textarea name="experience" rows="8" class="form-control">{{ Auth::user()->profile->experience }}</textarea>
              </div>
              <div class="form-group">
                <label for="">Bio</label>
                @error('bio')
                <p class="text-danger">{{ $message }}</p>
              @enderror
              <textarea name="bio" rows="8" class="form-control">{{ Auth::user()->profile->bio }}</textarea>
              </div>
              <div class="form-group">
                <button class="btn btn-info btn-block mt-3 p-1" type="submit">Update</button>
              </div>
          </form>
            </div>
        </div>

      </div>

      <!-- about section -->
      <div class="col-md-4">
        <div class="card border-light">
          <div class="card-header bg-light border-left-0 border-right-0 font-weight-bold text-center text-uppercase">About you</div>
          <div class="card-body">
            <p>Name: <strong class="font-weight-bold">{{ Auth::user()->name }}</strong></p>
            <p>Email: <strong class="font-weight-bold">{{ Auth::user()->email }}</strong></p>
            <p>Phone: <strong class="font-weight-bold">{{ Auth::user()->profile->phone_number }}</strong></p>
            <p>Address: <strong class="font-weight-bold">{{ Auth::user()->profile->address }}</strong></p>
            <p>Gender: <strong class="font-weight-bold text-capitalize">{{ Auth::user()->profile->gender }}</strong></p>
            <p>Profile created: <strong class="font-weight-bold">{{ Auth::user()->created_at->diffForHumans() }}</strong></p>

            <div class="btn-group dropright">
              <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">Your Files </button>
              <div class="dropdown-menu">
                @if (!empty(Auth::user()->profile->cover_letter))
                  <a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}" target="_blank" class="dropdown-item">Cover letter <i class="fas fa-file"></i></a> 
                @endif
                @if (!empty(Auth::user()->profile->resume))
                  <a href="{{ Storage::url(Auth::user()->profile->resume) }}" target="_blank" class="dropdown-item">Resume <i class="fas fa-file-contract"></i></a> 
                @endif
              </div>
            </div>

          </div>
        </div>

        <form action="{{ route('profile.coverletter') }}" method="post" enctype="multipart/form-data">
          @csrf
          @if (session('cover_letter'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
              {{ session('cover_letter') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <div class="card border-light mt-3">
            <div class="card-header bg-light border-left-0 border-right-0 text-center text-uppercase font-weight-bold">Update cover letter</div>
            <div class="card-body">
              <input type="file" name="cover_letter" class="">
              @error('cover_letter')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-info btn-block mt-3 p-1">Update</button>
            </div>
          </div>
        </form>

        <form action="{{ route('profile.resume') }}" method="post" enctype="multipart/form-data">
          @csrf
          @if (session('resume'))
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
              {{ session('resume') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <div class="card border-light mt-3">
            <div class="card-header bg-light border-left-0 border-right-0 text-center text-uppercase font-weight-bold">Update your resume</div>
            <div class="card-body">
              <input type="file" name="resume" class="">
              @error('resume')
              <p class="text-danger">{{ $message }}</p>
            @enderror
            <button type="submit" class="btn btn-info btn-block mt-3 p-1">Update</button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
@endsection
