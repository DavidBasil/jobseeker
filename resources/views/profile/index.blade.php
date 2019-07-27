@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <img src="{{ asset('avatar/man.jpg') }}" alt="" class="w-100">
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">Update your Profile</div>
          <div class="card-body">
            <div class="form-group">
              <label for="">Address</label>
              <input type="text" name="address" class="form-control">
            </div>
            <div class="form-group">
              <label for="">Experience</label>
              <textarea name="experience" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <label for="">Bio</label>
              <textarea name="bio" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-block" type="submit">Update</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">Your info</div>
          <div class="card-body">
            details of user
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-header">Update cover letter</div>
          <div class="card-body">
            <input type="file" name="cover_letter" class="">
            <button type="submit" class="btn btn-success btn-block mt-2">Update</button>
          </div>
        </div>
        <div class="card mt-3">
          <div class="card-header">Update your resume</div>
          <div class="card-body">
            <input type="file" name="resume" class="">
            <button type="submit" class="btn btn-success btn-block mt-2">Update</button>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
