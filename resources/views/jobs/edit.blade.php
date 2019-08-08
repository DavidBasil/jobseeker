@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-8 offset-md-2">

        <div class="card border-light">
          <div class="card-header bg-light border-left-0 border-right-0 font-weight-bold text-center text-uppercase mb-3">Update a job</div>

          <div class="card-body">

            <form action="{{ route('jobs.update', $job->id) }}" method="post">
              @csrf

              <div class="form-group">
                <label for="title">Title</label>
                @error('title')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="title" class="form-control" value="{{ $job->title }}">
              </div>

              <div class="form-group">
                <label for="description">Description</label>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea name="description" rows="8" cols="40" class="form-control">{{ $job->description }}</textarea>
              </div>

              <div class="form-group">
                <label for="roles">Roles</label>
                @error('roles')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea name="roles" rows="8" cols="40" class="form-control">{{ $job->roles }}</textarea>
              </div>

              <div class="form-group">
                <label for="category">Category</label>
                <select name="category_id" class="form-control">
                  @foreach (App\Category::all() as $cat)
                    <option value="{{ $cat->id }}"{{$cat->id==$job->category_id?'selected':''}}>{{ $cat->name }}</option> 
                  @endforeach 
                </select>
              </div>

              <div class="form-group">
                <label for="position">Position</label>
                @error('position')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="position" class="form-control" value="{{ $job->position }}">
              </div>

              <div class="form-group">
                <label for="address">Address</label>
                @error('address')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <input type="text" name="address" class="form-control" value="{{ $job->address }}">
              </div>

              <div class="form-group">
                <label for="type">Type</label>
                <select name="type" class="form-control">
                  <option value="fulltime"{{$job->type=='fulltime'?'selected':''}}>Fulltime</option> 
                  <option value="parttime"{{$job->type=='parttime'?'selected':''}}>Parttime</option> 
                </select>
              </div>

              <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control">
                  <option value="1" {{$job->status=='1'?'selected':''}}>Live</option> 
                  <option value="0" {{$job->status=='0'?'selected':''}}>Draft</option> 
                </select>
              </div>

              <div class="form-group">
                <label for="last_date">Last Date</label>
                <input type="date" name="last_date" class="form-control" value="{{ $job->last_date }}">
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-info btn-block mt-4">Update</button>
              </div>

            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
