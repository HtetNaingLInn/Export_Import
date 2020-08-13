<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Service_CategoryRequest;
use App\Service_Category;

class Service_CategoryController extends Controller
{

    public function index()
    {
        $categories = Service_Category::orderby('id', 'desc')->paginate('6');
        return view('admin.service_category.index', compact('categories'));

    }

    public function create()
    {
        return view('admin.service_category.create');
    }

    public function store(Service_CategoryRequest $request)
    {
        Service_Category::create([
            'name' => $request->name,
        ]);
        return redirect('admin/service_category')->with('status', 'Created Successful');
    }

    public function edit($id)
    {
        $category = Service_Category::find($id);
        return view('admin.service_category.edit', compact('category'));
    }

    public function update(Service_CategoryRequest $request, $id)
    {
        Service_Category::find($id)->update([
            'name' => $request->name,
        ]);
        return redirect('admin/service_category')->with('status', 'Edited Successful');
    }

    public function destroy($id)
    {
        $category = Service_Category::find($id)->delete();
        return redirect()->back()->with('status', 'Deleted Successful');
    }
}
