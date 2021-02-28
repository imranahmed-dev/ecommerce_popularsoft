<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductSize;
use App\Models\ProductColor;
use App\Models\ProductImage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::latest()->get();
        return view('backend.products.index-product', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['sizes'] = Size::all();
        $data['colors'] = Color::all();
        return view('backend.products.create-product', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:products,name',
            'category_id' => 'required',
            'brand_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
        ]);

        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $image = $request->file('image');
        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploaded/product'), $imageName);
            $product->image = '/uploaded/product/' . $imageName;
        }
        $product->save();

        //ProductImage
        $productImages = $request->product_image;
        if (!empty($productImages)) {
            foreach ($productImages as $productImage) {

                $myProductImage = new ProductImage();
                $myProductImage->product_id = $product->id;

                $imageName = time() . '_' . uniqid() . '.' . $productImage->getClientOriginalExtension();
                $productImage->move(public_path('uploaded/product'), $imageName);
                $myProductImage->product_image = '/uploaded/product/' . $imageName;
                $myProductImage->save();
            }
        }

        //Colors
        $colors = $request->color_id;
        if (!empty($colors)) {
            foreach ($colors as $color) {
                $mycolor = new ProductColor();
                $mycolor->product_id = $product->id;
                $mycolor->color_id = $color;
                $mycolor->save();
            }
        }

        //Size
        $sizes = $request->size_id;
        if (!empty($sizes)) {
            foreach ($sizes as $size) {
                $mysize = new ProductSize();
                $mysize->product_id = $product->id;
                $mysize->size_id = $size;
                $mysize->save();
            }
        }

        $notification = array(
            'message' => 'Product created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
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
        $data['product'] = Product::find($id);
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['sizes'] = Size::all();
        $data['colors'] = Color::all();
        $data['selectColor'] = ProductColor::select('color_id')->where('product_id', $id)->orderBy('id', 'asc')->get()->toArray();
        $data['selectSize'] = ProductSize::select('size_id')->where('product_id', $id)->orderBy('id', 'asc')->get()->toArray();
        $data['productImages'] = ProductImage::where('product_id', $id)->get();
        return view('backend.products.edit-product', $data);
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
        $validatedData = $request->validate([
            'name' => 'required|unique:products,name,' . $id,
            'category_id' => 'required',
            'brand_id' => 'required',
            'color_id' => 'required',
            'size_id' => 'required',
        ]);

        $product = Product::find($id);
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->price = $request->price;
        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;
        $image = $request->file('image');

        if ($image) {
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image_path = $product->image;
            @unlink(public_path($image_path));
            $image->move(public_path('uploaded/product'), $imageName);
            $product->image = '/uploaded/product/' . $imageName;
        }
        $product->save();

        $productImages = $request->product_image;
        if (!empty($productImages)) {
            $subImages = ProductImage::where('product_id', $id)->get();
            foreach ($subImages as $subImage) {
                $image_path = $subImage->product_image;
                @unlink(public_path($image_path));
            }
            ProductImage::where('product_id', $id)->delete();

            foreach ($productImages as $productImage) {

                $myProductImage = new ProductImage();
                $myProductImage->product_id = $product->id;
                $imageName = time() . '_' . uniqid() . '.' . $productImage->getClientOriginalExtension();
                $productImage->move(public_path('uploaded/product'), $imageName);
                $myProductImage->product_image = '/uploaded/product/' . $imageName;
                $myProductImage->save();
            }
        }

        //Colors
        $colors = $request->color_id;
        if (!empty($colors)) {
            $delcolor = ProductColor::where('product_id', $id);
            $delcolor->delete();
            foreach ($colors as $color) {
                $mycolor = new ProductColor();
                $mycolor->product_id = $product->id;
                $mycolor->color_id = $color;
                $mycolor->save();
            }
        }

        //Size
        $sizes = $request->size_id;
        if (!empty($sizes)) {
            $delsize = ProductSize::where('product_id', $id);
            $delsize->delete();
            foreach ($sizes as $size) {
                $mysize = new ProductSize();
                $mysize->product_id = $product->id;
                $mysize->size_id = $size;
                $mysize->save();
            }
        }

        $notification = array(
            'message' => 'Product created successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
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
        $image_path = $product->image;
        @unlink(public_path($image_path));
        $subImages = ProductImage::where('product_id', $id)->get();
        if(!empty($subImages)){
            foreach ($subImages as $subImage) {
                $image_path = $subImage->product_image;
                @unlink(public_path($image_path));
            }
        }
        ProductImage::where('product_id',$id)->delete();
        ProductColor::where('product_id',$id)->delete();
        ProductSize::where('product_id',$id)->delete();
        $product->delete();

        $notification = array(
            'message' => 'Product deleted successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
