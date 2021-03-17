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
            <h1 class="text-center">User selected: </a></h1>
            <div class="align-self-end">
                <form action="/users/{{$user->id}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger">delete user</button>
                </form>
            </div>
            <h3>{{$user->name}} {{$user->profiles->first}}</h5>
            <h4 class="text-muted">from {{$user->profiles->country}}</h3>
            <h5 class="text-primary">{{$user->profiles->age}} y. old</h5>
            <h6>{{$user->email}}</h6>
            <h1 class="text-primary my-5">All their images</h1>
            <div class="row">
                @foreach ($user->photos as $photo)
                    <div class="col-md-4">
                        <img src="/storage/img/{{$photo->src}}" alt="" class="img-fluid">
                    </div>
                @endforeach
            </div>
            <a href="/users" class="btn btn-dark">go back</a>
        </div>
    </div>
</div>
@endsection