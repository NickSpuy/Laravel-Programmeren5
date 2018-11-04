<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Product;
use App\Order;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    public function admin()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'product_image' => 'image|nullable|max:1999' 
        ]);

        // Handle File Upload
        if($request->hasFile('product_image')){
            // Get filename with ext
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            // Get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get ext
            $extension = $request->file('product_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('product_image')->storeAs('public/product_image', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->product_image = $fileNameToStore;
        $product->save();

        return redirect('/product')->with('succes', 'Post Created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @param  int  $id
     */
    public function order(Request $request)
    {
        // Create order
        $order = new Order;
        $order->users_id = $users_id = auth()->user()->id;
        $order->products_id = $request->input('productid');
        $order->save();

        return redirect('/product')->with('succes', 'Product Ordered!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'product_image' => 'image|nullable|max:1999' 
        ]);

        // Handle File Upload
        if($request->hasFile('product_image')){
            // Get filename with ext
            $filenameWithExt = $request->file('product_image')->getClientOriginalName();
            // Get filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get ext
            $extension = $request->file('product_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('product_image')->storeAs('public/product_image', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Create Post
        $product = new Product;
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->product_image = $fileNameToStore;
        $product->save();

        return redirect('/admindashboard')->with('succes', 'Post Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if($product->product_image != 'noimage.jpg'){
            // Delete Image
            Storage::delete('public/product_image/'.$product->product_image);
        }

        $product->delete();
        return redirect('/product')->with('succes', 'Product Removed');
    }
}