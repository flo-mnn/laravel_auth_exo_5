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
            <h1 class="text-center">All users</a></h1>
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">First</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <th scope="row">{{$user->id}}</th>
                      <td>{{$user->name}}</td>
                      <td>{{$user->profiles->first}}</td>
                      <td><a href="{{route('users.show',['user' => $user->id])}}" class="btn btn-primary">Show</a></td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection