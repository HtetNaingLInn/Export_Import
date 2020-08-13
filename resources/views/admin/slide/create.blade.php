@extends('admin.layouts.master')

@section('title','Slide Images')

@section('content')


<div class="container-fluid">
    @if (session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
              @endif

              <a href="{{Route('slide.list')}}">
                <button class="btn btn-info mb-3">
                    <div class="fas fa-arrow-circle-left"></div> Back
                </button>
              </a>
    <div class="card">
        <div class="card-header">
            <h4>Add Image</h4>
        </div>
        <div class="card-body">

        <form method="POST" enctype="multipart/form-data" action="{{Route('slide.store')}}">
                @include('admin.message.error')
                @csrf
                <div class="form-group">
                    <label class="text-bold" >Upload Yours Slideshow Photos</label>
                    <input type="file" class="form-control" name="image" required>
                  </div>

                <button type="submit" class="btn btn-outline-info float-md-right">Add</button>
            </form>


        </div>
    </div>
</div>
@endsection
