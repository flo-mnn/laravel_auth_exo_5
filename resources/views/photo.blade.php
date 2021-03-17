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
            <h1 class="text-center">My images <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPhoto"> Add an image</button></h1>
            <div class="row">
                @foreach (Auth::user()->photos as $photo)
                   <div class="col-md-4">
                       <img src="/storage/img/{{$photo->src}}" alt="" class="img-fluid">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
  
  <!-- Modal -->
  <div class="modal fade" id="createPhoto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add an image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="/photos" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="src">
            <button type="submit" class="btn btn-primary">Add a picture</button>
        
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection