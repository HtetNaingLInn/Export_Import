@extends('admin.layouts.master')

@section('title','Slide Images')

@section('content')


<div class="container-fluid">
    @if (session('status'))
            <p class="alert alert-success">{{session('status')}}</p>
              @endif

<a href="{{Route('slide.add')}}"><button class="btn btn-info mb-3">
                <div class="fas fa-plus-circle"></div> &nbsp;Add Image
                 </button></a>
    <div class="card">
        <div class="card-header">
            <h5 class="text-primary card-title">Slideshow Images</h5>
        </div>
        <div class="card-body">
            <div class="row">

                @foreach ($slides as $slide)


                <div class="col-md-4 pl-4 text-center mt-3">
                 <img src="  {{asset('/slideshow/'.$slide->image)}}" class="img-thumbnail w-50 h-20" alt="image">
                <a href="{{Route('slide.delete',$slide->id)}}">

                        <i class="fas fa-trash text-danger pl-2"></i>

                </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
