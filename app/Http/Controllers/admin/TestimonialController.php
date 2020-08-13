<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialRequest;
use App\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{

    public function index()
    {
        $testimonials = Testimonial::orderby('id', 'desc')->paginate('6');
        return view('admin.testimonial.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonial.create');
    }

    public function store(TestimonialRequest $request)
    {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(\public_path() . '/testimonial/', $imageName);
        Testimonial::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'image' => $imageName,
        ]);
        return redirect('admin/testimonial')->with('status', 'Added Successful');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/testimonial/', $imageName);
        } else {
            $testimonial = Testimonial::find($id);
            $imageName = $testimonial->image;
        }
        testimonial::find($id)->update([
            'name' => $request->name,
            'comment' => $request->comment,
            'image' => $imageName,

        ]);
        return redirect('admin/testimonial')->with('status', 'Edited Successful');

    }

    public function destroy($id)
    {
        $testimonial = Testimonial::find($id)->delete();
        return redirect()->back()->with('status', 'Deleted Successful');
    }
}
