<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Service;
use App\Service_Category;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = Service::orderby('id', 'desc')->paginate('6');
        return view('admin.service.index', compact('services'));
    }

    public function create()
    {
        $categories = Service_Category::all();
        return view('admin.service.create', compact('categories'));
    }

    public function store(ServiceRequest $request)
    {
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path() . '/service/', $imageName);

        Service::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'service_category_id' => $request->service_category_id,
        ]);
        return redirect('admin/service')->with('status', 'Created Successful');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $service = Service::find($id);
        $categories = service_category::all();
        return view('admin.service.edit', compact('service', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path() . '/service/', $imageName);
        } else {
            $service = Service::find($id);
            $imageName = $service->image;
        }
        Service::find($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
            'service_category_id' => $request->service_category_id,
        ]);
        return redirect('admin/service')->with('status', 'Edited Successful');

    }

    public function destroy($id)
    {
        $service = Service::find($id)->delete();
        return redirect()->back()->with('status', 'Deleted Successful');
    }
}
