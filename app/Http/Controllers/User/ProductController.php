<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductImage;
use Session;
use Carbon\Carbon;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->get();
        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:150',
            
        ]);

        if($request->hasfile('image')){
            $image = $request->image;
            $image_logo_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/image/',$image_logo_new_name);
            $image_logo_new_name = 'uploads/image/'.$image_logo_new_name;

        }else{
            $image_logo_new_name = '';
        }


        $slug = strtolower(str_replace(' ', '-', $request->name));

        $product = Product::create([
            'brand_id'              => $request->brand_id,
            'category_id'           => $request->category_id,
            'name'                  => $request->name,
            'slug'                  => $slug,
            'price'                 => $request->price,
            'vat'                   => $request->vat,
            'discount'              => $request->discount,
            'image'                 => $image_logo_new_name,
            'status'                => $request->status
        ]);

        Session::flash('success','Product Inserted Successfully');
        return response()->json($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
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
        $product = Product::find($id);

         $this->validate($request,[
            'name' => 'required|max:150',
            
        ]);

        if($request->hasfile('image')){
            $image = $request->image;
            $image_logo_new_name = time().$image->getClientOriginalName();
            $image->move('uploads/image/',$image_logo_new_name);
            $image_logo_new_name = 'uploads/image/'.$image_logo_new_name;

        }else{
            $image_logo_new_name = '';
        }


        $slug = strtolower(str_replace(' ', '-', $request->name));

        $product->brand_id = $request->brand_id;
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->vat = $request->vat;
        $product->discount = $request->discount;
        $product->image =$image_logo_new_name;
        $product->status =$request->status;
        $product->save();

        // $product = Product::update([
        //     'brand_id'              => $request->brand_id,
        //     'category_id'           => $request->category_id,
        //     'name'                  => $request->name,
        //     'slug'                  => $slug,
        //     'price'                 => $request->price,
        //     'vat'                   => $request->vat,
        //     'discount'              => $request->discount,
        //     'image'                 => $image_logo_new_name,
        //     'status'                => $request->status
        // ]);

        Session::flash('success','Product Updated Successfully');
        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        Session::flash('success','Product Deleted Successfully');
        return response()->json($product);
    }
}
