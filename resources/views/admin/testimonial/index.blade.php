@extends('admin.layouts.master')

@section('title','Testimonial List')

@section('content')

<div class="container-fluid">

    @if (session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
          @endif
     <a href="{{Route('testimonial.create')}}" ><button type="submit" class="btn btn-info mb-3">
         <div class="fas fa-plus-circle"></div> &nbsp; Added Testimonial
      </button></a>

     <div class="card col-md-12">
        <div class="card-header">
            <h2 class="card-title text-primary">Testimonial List</h2>
        </div>

        <div class="card-body">
        <table class="table table-bordered table-responsive-md">
            <thead>
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Comment</th>

                <th  colspan="2">Action</th>

              </tr>
            </thead>
            <tbody>



               @foreach ($testimonials as $testimonial)
               <tr>

                <td>{{$testimonial->id}}</td>
                <td class="w-25 h-20 user-panel mt-3 pb-3 mb-3"><img src="{{asset('/testimonial/'.$testimonial->image)}}" class="w-50 h-20 img-circle elevation-2" alt="image"></td>
                <td>{{$testimonial->name}}</td>
               <td>{{Str::limit($testimonial->comment,'50')}}</td>
                <td><a href="{{Route('testimonial.edit',$testimonial->id)}}" class="btn-sm btn-outline-info"><i class="fas fa-edit"></i></a></td>
                <td><a href="{{Route('testimonial.delete',$testimonial->id)}}" class="btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a></td>

                </tr>

               @endforeach


            </tbody>

            <div class="col-md-12">
                {{$testimonials->links()}}
            </div>
          </table>
        </div>

</div>

</div>
@endsection
