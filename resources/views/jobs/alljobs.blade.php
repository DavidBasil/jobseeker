@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">

      <!-- filter form -->
      <form action="{{ route('alljobs') }}" method="get">
        <div class="form-inline">

          {{-- <div class="form-group"> --}}
          {{--   <label>Keyword</label> --}}
          {{--   <input type="text" name="title" class="form-control"> --}}
          {{-- </div> --}}

          <div class="form-group">
            <label>Employment type</label>
            <select name="type" class="form-control">
              <option selected="true" disabled>-select-</option>
              <option value="fulltime">fulltime</option>
              <option value="parttime">parttime</option>
              <option value="casual">casual</option>
            </select>
          </div>

          <div class="form-group">
            <label>Category</label>
            <select name="category_id" class="form-control">
              <option selected="true" disabled>-select-</option>
              @foreach (App\Category::all() as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option> 
              @endforeach
              <option></option> 
            </select>
          </div>

          {{-- <div class="form-group"> --}}
          {{--   <label>Address</label> --}}
          {{--   <input type="text" name="address" class="form-control"> --}}
          {{-- </div> --}}

          <div class="form-group">
            <button type="submit" class="btn btn-default">search</button>
          </div>

        </div>
      </form>
      <!-- /filter form -->

      <h2>Recent Jobs</h2>

      <div class="row">
        <div class="col-md-12">
          @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          @endif
        </div>
      </div>

      <table class="table">
        <tbody>
          @foreach ($jobs as $job)
            <tr>
              <td>
                <img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" width="80" alt="">
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

      {{ $jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links() }}
    </div>

  </div>

@endsection
