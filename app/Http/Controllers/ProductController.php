<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function show(Product $product){
        
        return view('products.show', compact('product', 'product'));
    }


    public function store(Request $request, int $productId)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:png,jpg,jpeg,webp'
        ]);

        $product = Product::findOrFail($productId);

        $imageData = [];
        if($files = $request->file('images')){

            foreach($files as $key => $file){

                $extension = $file->getClientOriginalExtension();
                $filename = $key.'-'.time(). '.' .$extension;

                $filename = Storage::put('products', $file);
                

                $imageData[] = [
                    'product_id' => $product->id,
                    'image_path' => $filename,
                    
                ];
            }
        }

        ProductImage::insert($imageData);

        return redirect()->back()->with('status', 'Uploaded Successfully');

    }



}
