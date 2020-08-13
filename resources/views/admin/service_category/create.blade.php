@extends('admin.layouts.master')

@section('title','Create Category')

@section('content')
<div class="container">

     <div class="col-md-10 offset-1">
        <a href="{{Route('service_category.list')}}"><button class="btn btn-info mb-3"> <div class="fas fa-arrow-circle-left"></div> Back</button></a>
        <div class="card">

            <div class="card-header">
        <h4 class="text-info">Create New Category</h4>

            </div>
            <div class="card-body">
            <form method="POST" action="{{Route('service_category.store')}}">
                    @include('admin.message.error')
                    @csrf
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" class="form-control"  name="name" required>
                    </div>
                    <button type="submit" class="btn btn-outline-info float-md-right">Create</button>
                </form>

            </div>

    </div>
     </div>
    </div>

@endsection
