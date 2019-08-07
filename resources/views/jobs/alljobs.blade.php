@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">

      <!-- filter form -->
      <form action="{{ route('alljobs') }}" method="get" class="w-100">

        <div class="row">
          <div class="col-md-4 py-2">
            <select name="type" class="custom-select">
              <option selected="true" disabled>-select-</option>
              <option value="fulltime">fulltime</option>
              <option value="parttime">parttime</option>
              <option value="casual">casual</option>
            </select>
          </div>

          <div class="col-md-1 text-center">
            <span><i class="fas fa-arrows-alt-h cyan-text fa-2x py-3"></i></span>
          </div>

          <div class="col-md-4 py-2">
            <select name="category_id" class="custom-select">
              <option selected="true" disabled>-select-</option>
              @foreach (App\Category::all() as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option> 
              @endforeach
              <option></option> 
            </select>
          </div>
          <div class="col-md-3">
            <button type="submit" class="btn btn-outline-info btn-block p-2 mt-2"><i class="fas fa-filter"></i> filter</button>
          </div>
        </div>

      </form>
      <!-- /filter form -->

      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif

      <table class="table table-hover">
        <tbody>
          @foreach ($jobs as $job)
            <tr>
              <td>
                <img src="{{ asset('uploads/logo') }}/{{ $job->company->logo }}" width="80" alt="">
              </td>
              <td><small>position:</small> <span class="font-weight-bold">{{ $job->position }}</span>
                <br>
                <i class="fa fa-clock"></i> {{ $job->type }}
              </td>
              <td><i class="fa fa-map-marker"></i> {{ $job->address }}</td>
              <td><i class="fa fa-globe"></i> {{ $job->created_at->diffForHumans() }}</td>
              <td>
                <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" class="btn btn-outline-primary btn-rounded waves-effect btn-sm">Apply</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="d-flex justify-content-center text-center">
        {{ $jobs->appends(Illuminate\Support\Facades\Input::except('page'))->links() }}
      </div>
    </div>

  </div>

@endsection
