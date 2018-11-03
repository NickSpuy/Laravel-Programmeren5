<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;

class PagesController extends Controller
{
    public function index(){
        $title = 'Welcome';
        //return view('pages.index', compact('title')); 
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.index')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Programming', 'SEO']
        );
        return view('pages.services')->with($data); 
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|min:3',
        ]);

        $search = $request->input('search');
        $checkbox = $request->input('nameTable');
        $dropdown = $request->input('dropdown');

        if($checkbox == "kees"){
            $products = Product::where('description', 'like', "%$search%")->orderBy($dropdown, 'asc')->get();
        } else {
            $products = Product::where('name', 'like', "%$search%")->orderBy($dropdown, 'desc')->get();
        }
        
        return view('/products/search')->with('products', $products);
    } 
}
