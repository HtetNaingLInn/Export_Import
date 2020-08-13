@extends('admin.layouts.master')

@section('title','Add Service')

@section('content')
<div class="container-fluid">

        <a href="{{Route('service.list')}}"><button class="btn btn-info mb-3"> <div class="fas fa-arrow-circle-left"></div> Back</button></a>
        <div class="card">

            <div class="card-header">
        <h3 class="text-info card-title">Create New Service</h3>

            </div>
            <div class="card-body">

              @if (session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
              @endif
            <form method="POST" enctype="multipart/form-data" action="{{Route('service.store')}}">
                    @include('admin.message.error')
                    @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                    <input type="text" class="form-control"  name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control"  rows="3" name="description" ></textarea>
                    </div>

                    <div class="form-group">
                        <label>Select Category</label>
                        <select class="form-control" name="service_category_id">
                            <option value="#">Choose Category</option>
                          @foreach ($categories as $category)

                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>
                      </div>





                    <div class="form-group">
                        <label class="text-bold" >Upload Yours Service Photo</label>
                        <input type="file" class="form-control" name="image">
                      </div>

                    <button type="submit" class="btn btn-outline-info float-md-right">create</button>
                </form>

            </div>

    </div>
     </div>








@endsection
