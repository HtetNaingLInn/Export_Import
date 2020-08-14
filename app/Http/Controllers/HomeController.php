<?php

namespace App\Http\Controllers;

use App\Service;
use App\Service_Category;
use App\Slide;
use App\Testimonial;

class HomeController extends Controller
{

    public function index()
    {

        $slides = Slide::all();
        $categories = Service_Category::all();
        $services = Service::all();
        $testimonial = Testimonial::all();

        $category = Service_Category::find(1);
        $service = $category->service;
        return view('home', compact('slides', 'categories', 'services', 'testimonial', 'service'));
    }

}
