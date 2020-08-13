@extends('admin.layouts.master')

@section('title','Service List')

@section('content')

<div class="container-fluid">

    @if (session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
          @endif
     <a href="{{Route('service.create')}}" ><button type="submit" class="btn btn-info mb-3">
         <div class="fas fa-plus-circle"></div> &nbsp; Create Service
      </button></a>

     <div class="card col-md-12">
        <div class="card-header">
            <h2 class="card-title text-primary">Service List</h2>
        </div>

        <div class="card-body">
        <table class="table table-bordered table-responsive-md">
            <thead>
              <tr>
                <th>No.</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>

                <th  colspan="2">Action</th>

              </tr>
            </thead>
            <tbody>



               @foreach ($services as $service)
               <tr>

                <td>{{$service->id}}</td>
                <td class="w-25 h-20"><img src="{{asset('/service/'.$service->image)}}" class="img-thumbnail w-50 h-20" alt="image"></td>
                <td>{{$service->title}}</td>
               <td>{{Str::limit($service->description,'50')}}</td>
                <td><a href="{{Route('service.edit',$service->id)}}" class="btn-sm btn-outline-info"><i class="fas fa-edit"></i></a></td>
                <td><a href="{{Route('service.delete',$service->id)}}" class="btn-sm btn-outline-danger"><i class="fas fa-trash"></i></a></td>

                </tr>

               @endforeach


            </tbody>

            <div class="col-md-12">
                {{$services->links()}}
            </div>
          </table>
        </div>

</div>

</div>
@endsection
