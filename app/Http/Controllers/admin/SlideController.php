<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SlideRequest;
use App\Slide;

class SlideController extends Controller
{

    public function index()
    {
        $slides = Slide::orderby('id', 'desc')->paginate('6');
        return view('admin.slide.index', compact('slides'));
    }

    public function create()
    {
        return view('admin.slide.create');
    }

    public function store(SlideRequest $request)
    {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path() . '/slideshow/', $imageName);

        Slide::create([
            'image' => $imageName,
        ]);
        return redirect('admin/slide')->with('status', 'Added Successful');
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        $slide = Slide::find($id);
        $slide->delete();
        return redirect()->back()->with('status', 'Deleted Successful');
    }
}
