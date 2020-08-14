@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         <div class="card">
             <div class="card-header">
                 Home
             </div>
             <h3>Slides</h3>
               @foreach ($slides as $slide)
                   {{$slide}}
               @endforeach
                <hr>
             <div class="card-body">
                <h3>Category</h3>
                 {{$categories}}
                <hr>
                <h3>Service</h3>
                {{$services}}
                <hr>
                <h3>Testimonial</h3>
                {{$testimonial}}
                <hr>
                <h3>Service search by Category</h3>
                {{$service}}
             </div>
         </div>
        </div>
    </div>
</div>
@endsection
