@extends('admin.layouts.master')

@section('title','Add testimonial')

@section('content')
<div class="container-fluid">

        <a href="{{Route('testimonial.list')}}"><button class="btn btn-info mb-3"> <div class="fas fa-arrow-circle-left"></div> Back</button></a>
        <div class="card">

            <div class="card-header">
        <h3 class="text-info card-title">Add New testimonial</h3>

            </div>
            <div class="card-body">

              @if (session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
              @endif
            <form method="POST" enctype="multipart/form-data" action="{{Route('testimonial.store')}}">
                    @include('admin.message.error')
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                    <input type="text" class="form-control"  name="name" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="comment">Comment</label>
                        <textarea class="form-control"  rows="3" name="comment" ></textarea>
                    </div>


                    <div class="form-group">
                        <label class="text-bold" >Upload Photo</label>
                        <input type="file" class="form-control" name="image">
                      </div>

                    <button type="submit" class="btn btn-outline-info float-md-right">create</button>
                </form>

            </div>

    </div>
     </div>








@endsection
