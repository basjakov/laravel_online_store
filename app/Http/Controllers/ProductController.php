<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImages;
use Illuminate\Http\Request;


//working with storage
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Detail;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('shop.product.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cover = $request->file('first_image');
        Storage::disk('public')->put('/product/'.$request->name.'/'.$cover->getClientOriginalName(),  File::get($cover));

        $product = new product();

        $product->name = $request->name;
        $product->distributor = $request->distributor;
        $product->category_id = 1;
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->first_image = $cover->getClientOriginalName();
        $product->itemvideo = $request->itemvideo;
        $product->short_desc = $request->short_desc;
        $product->large_desc = $request->large_desc;
        $product->weight = $request->weight;

        $product->save();

        foreach($request->file('files') as $image)
        {
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/uploads/product/'.$request->name, $name);


            ProductImages::create([
                'product_id' =>$product->id,
                'filename'=>$name
            ]);
        }

      
        return redirect('/admin');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
            $ProductImages = ProductImages::where('product_id',$product->id)->get();
            return view('shop.product.show',compact('product','ProductImages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $myproduct = Product::find($product->id);
        return view('shop.product.edit',compact('myproduct'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $cover = $request->file('first_image');
        Storage::disk('public')->put('/product/'.$request->name.'/'.$cover->getClientOriginalName(),  File::get($cover));

        

        $product->name = $request->name;
        $product->distributor = $request->distributor;
        $product->category_id = 1;
        $product->price = $request->price;
        $product->sale = $request->sale;
        $product->first_image = $cover->getClientOriginalName();
        $product->itemvideo = $request->itemvideo;
        $product->short_desc = $request->short_desc;
        $product->large_desc = $request->large_desc;
        $product->weight = $request->weight;

        $product->save();

        foreach($request->file('files') as $image)
        {
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/uploads/product/'.$request->name, $name);


            ProductImages::create([
                'product_id' =>$product->id,
                'filename'=>$name
            ]);
        }

      
        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $files = glob('uploads/product/'.$product->name.'/*'); // get all file names
        foreach($files as $file){
            if(is_file($file))
                unlink($file);
        }
       rmdir('uploads/product/'.$product->name);
       $servicename = DB::table('product_images')->where('product_id',$product->id)->delete();
       $product->delete();
       return redirect('/admin');
    }
}
