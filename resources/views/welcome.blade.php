@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <h2>Recent Jobs</h2>
      <table class="table">
        <thead>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </thead>
        <tbody>
          <tr>
            <td>
              <img src="{{ asset('avatar/man.jpg') }}" width="80" alt="">
            </td>
            <td>position: web developer</td>
            <td><i class="fa fa-map-marker"></i> address: Melbourne</td>
            <td>date: 2019-07-26</td>
            <td>
              <button class="btn btn-success btn-sm">apply</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
@endsection
