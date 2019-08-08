@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">

        <div class="card border-light">
          <div class="card-header bg-light border-right-0 border-left-0 font-weight-bold text-uppercase text-center mb-4">Add a Job</div>

          <div class="card-body">

            <form action="{{ route('jobs.store') }}" method="post">
              @csrf

              <div class="form-group">
                <label for="title">Title</label>
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="title" class="form-control">
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea name="description" rows="8" cols="40" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label for="roles">Roles</label>
                @error('roles')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea name="roles" rows="8" cols="40" class="form-control"></textarea>
              </div>

              <div class="form-group">
                <label for="category">Category</label>
                <select name="category"class="form-control">
                  @foreach (App\Category::all() as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option> 
                  @endforeach 
                </select>
              </div>

              <div class="form-group">
                <label for="position">Position</label>
                @error('position')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="position" class="form-control">
              </div>

              <div class="form-group">
                <label for="address">Address</label>
                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="address" class="form-control">
              </div>

              <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-control">
                  <option value="fulltime">Fulltime</option> 
                  <option value="parttime">Parttime</option> 
                </select>
              </div>

              <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                  <option value="1">Live</option> 
                  <option value="0">Draft</option> 
                </select>
              </div>

              <div class="form-group">
                <label for="last_date">Last Date</label>
                <input type="date" name="last_date" class="form-control">
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-info btn-block mt-4">Submit</button>
              </div>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
