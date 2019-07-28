@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      @endif
      <div class="card">
        <div class="card-header">My Jobs</div>
        <div class="card-body">

          <table class="table">
            <tbody>
              @foreach ($jobs as $job)
                <tr>
                  <td class="w-25">
                    @if (!empty(Auth::user()->company))
                      <img src="{{ asset('uploads/logo') }}/{{Auth::user()->company->logo }}" alt="" class="w-50"> 
                    @else
                      <img src="{{ asset('avatar/man.jpg') }}" alt="" class="w-50">
                    @endif
                    {{-- <img src="{{ asset('avatar/man.jpg') }}" width="80" alt=""> --}}
                  </td>
                  <td>position: {{ $job->position }}
                    <br>
                    <i class="fa fa-clock"></i> {{ $job->type }}
                  </td>
                  <td><i class="fa fa-map-marker"></i> {{ $job->address }}</td>
                  <td><i class="fa fa-globe"></i> {{ $job->created_at->diffForHumans() }}</td>
                  <td>
                    <a href="{{ route('jobs.edit', [$job->id]) }}" class="btn btn-info">Edit</a>
                  </td>
                </tr>
              @endforeach
            </tbody>            
          </table>

        </div>
      </div>

    </div>
  </div>
@endsection
