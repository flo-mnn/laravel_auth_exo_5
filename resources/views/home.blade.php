@extends('layouts.app')

@section('content')
<div class="w-100 h-100">
    <div class="row justify-content-start">
        <div class="col-md-3">
            <div class="card bg-success">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{'Welcome '. Auth::user()->name . " " . Auth::user()->profiles->first. "!" }}
                </div>
                <div class="card-body">
                    <a href="{{route('photos.index')}}">Images</a><br>
                    <a href="{{route('users.index')}}">Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <h1 class="text-center">Welcome to your back office, navigate here on the left</h1>
            
    </div>
</div>
@endsection
