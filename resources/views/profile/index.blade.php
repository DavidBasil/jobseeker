@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-2">
        <img src="{{ asset('avatar/man.jpg') }}" alt="" class="w-100">
      </div>
      <div class="col-md-6">
        @if (session('message'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif
        <div class="card">
          <div class="card-header">Update your Profile</div>
          <form action="{{ route('profile.create') }}" method="post">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="">Address</label>
                <input type="text" name="address" class="form-control" value="{{ Auth::user()->profile->address }}">
              </div>
              <div class="form-group">
                <label for="">Experience</label>
                <textarea name="experience" rows="8" class="form-control">{{ Auth::user()->profile->experience }}</textarea>
              </div>
              <div class="form-group">
                <label for="">Bio</label>
                <textarea name="bio" rows="8" class="form-control">{{ Auth::user()->profile->bio }}</textarea>
              </div>
              <div class="form-group">
                <button class="btn btn-success btn-block" type="submit">Update</button>
              </div>
          </form>
            </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-header">About you</div>
          <div class="card-body">
            <p>Name: <strong>{{ Auth::user()->name }}</strong></p>
            <p>Email: <strong>{{ Auth::user()->email }}</strong></p>
            <p>Address: <strong>{{ Auth::user()->profile->address }}</strong></p>
            <p>Gender: <strong>{{ Auth::user()->profile->gender }}</strong></p>
            <p>Profile created: <strong>{{ Auth::user()->created_at->diffForHumans() }}</strong></p>
            @if (!empty(Auth::user()->profile->cover_letter))
             <a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}" target="_blank" class="nav-link">Cover letter</a> 
            @endif
            @if (!empty(Auth::user()->profile->resume))
              <a href="{{ Storage::url(Auth::user()->profile->resume) }}" target="_blank" class="nav-link">Resume</a> 
            @endif
          </div>
        </div>

        <form action="{{ route('profile.coverletter') }}" method="post" enctype="multipart/form-data">
          @csrf
          @if (session('cover_letter'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
              {{ session('cover_letter') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
          <div class="card mt-3">
            <div class="card-header">Update cover letter</div>
            <div class="card-body">
              <input type="file" name="cover_letter" class="">
              <button type="submit" class="btn btn-success btn-block mt-2">Update</button>
            </div>
          </div>
        </form>

        <form action="{{ route('profile.resume') }}" method="post" enctype="multipart/form-data">
          @csrf
          @if (session('resume'))
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
              {{ session('resume') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif

          <div class="card mt-3">
            <div class="card-header">Update your resume</div>
            <div class="card-body">
              <input type="file" name="resume" class="">
              <button type="submit" class="btn btn-success btn-block mt-2">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
