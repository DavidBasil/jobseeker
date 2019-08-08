@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-light">
                <div class="card-header border-left-0 border-right-0 bg-light text-uppercase text-center">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <span class="text-danger text-center d-block">You are logged in!</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
