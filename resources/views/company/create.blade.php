@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">

      <!-- left column -->
      <div class="col-md-3">

        <!-- sessions messages -->
        @if (session('logo'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('logo') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <!-- logo -->
        @if (!empty(Auth::user()->company->logo))
          <img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" alt="" class="w-75 ml-4">  
        @else
          <img src="{{ asset('avatar/man.jpg') }}" alt="" class="w-75 ml-4">
        @endif

        <!-- avatar form -->
        <form action="{{ route('company.logo') }}" class="mt-3" method="post" enctype="multipart/form-data">
          @csrf
          <input type="file" name="logo" class="mt-2">
          @error('logo')
          <p class="text-danger mt-2">{{ $message }}</p>
        @enderror
        <button type="submit" class="btn btn-info btn-block mt-3 p-1">update</button>
        </form>

      </div>

      <!-- center column -->
      <div class="col-md-5">

        <!-- session messages -->
        @if (session('message'))
          <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <div class="card border-light">
          <div class="card-header bg-light border-left-0 border-right-0 text-uppercase text-center font-weight-bold mb-2">Update your company</div>
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
                <button class="btn btn-info btn-block mt-2 p-1" type="submit">Update</button>
              </div>

          </form>
            </div>
        </div>
      </div>

      <!-- right column -->
      <div class="col-md-4">
        <div class="card border-light">
          <div class="card-header bg-light border-right-0 border-left-0 text-center text-uppercase font-weight-bold">About you</div>
          <div class="card-body">
            <p>Company name: <strong class="font-weight-bold">{{ Auth::user()->company->cname }}</strong></p>
            <p>Company address: <strong class="font-weight-bold">{{ Auth::user()->company->address }}</strong></p>
            <p>Company phone: <strong class="font-weight-bold">{{ Auth::user()->company->phone }}</strong></p>
            <p>Company website: <strong class="font-weight-bold"><a href="{{ Auth::user()->company->website }}" target="_blank">{{ Auth::user()->company->website }}</a></strong></p>
            <p>Company slogan: <strong class="font-weight-bold">{{ Auth::user()->company->slogan }}</strong></p>
            <p>Company page: <a href="{{ route('company.show',[Auth::user()->company->id, Auth::user()->company->slug ]) }} ">View</a></p>
          </div>
        </div>

        @if (session('cover_photo'))
          <div class="alert alert-danger alert-dismissible fade show mt-2 text-center" role="alert">
            {{ session('cover_photo') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        @endif

        <div class="card border-light mt-3">
          <div class="card-header bg-light border-right-0 border-left-0 text-center text-uppercase font-weight-bold">Update Cover Photo</div>
          <div class="card-body">
            <form action="{{ route('cover.photo') }}" method="post" enctype="multipart/form-data">
              @csrf
              <input type="file" name="cover_photo" class="mt-2">
              @error('cover_photo')
              <p class="text-danger">{{ $message }}</p>
              @enderror
              <button type="submit" class="btn btn-info btn-block mt-3 p-1">Update</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
