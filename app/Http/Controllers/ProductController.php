<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Support\Facades\DB;
use App\Models\Publisher;

class ProductController extends Controller
{
    public function home()
    {
        $products = Product::latest()->paginate(20);

        return view('product.home', compact('products'))

            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
    public function index()
    {
        $products = Product::latest()->paginate(20);
        return view('product.index', compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 20);
    }
    public function admin()
    {
        return view('admin.home');
    }
    public function create()
    {
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('product.create', ['publishers' => $publishers, 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image.*' => 'required|image|mimes:jpg,jpeg,png|max:100000',
            ]);

            if ($validator->fails()) {

                return redirect()->back()

                    ->withErrors($validator)

                    ->withInput();

            }


            if ($request->hasfile('image')) {
                $Product_Images = [];
                $images = $request->file('image');
                foreach ($images as $image) {
                    $path = public_path('image/product');
                    $image_name = time() . '_' . $image->getClientOriginalName();
                    $image->move($path, $image_name);
                    $Product_Images[] = $image_name;
                }
            } else {
                $image_name = 'noname.jpg';
            }


            $newProduct = new Product();
            $newProduct->name = $request->name;
            $newProduct->price = $request->price;
            $newProduct->description = $request->description;
            $newProduct->publisher_id = $request->publisher;


            $newProduct->save();
            $newProduct->category()->attach($request->input('categories'));
            $lastInserttedID = $newProduct->id;
            foreach ($Product_Images as $image) {
                $newProductImage = new Image();
                $newProductImage->image = $image;
                $newProductImage->product_id = $lastInserttedID;
                $newProductImage->save();
            }

            return redirect()->route('product.index')

                ->with('success', 'Game Add successfully.');
        }

    }
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('product.show', compact('product'));
    }
    public function edit($id)
    {
        $publishers = Publisher::all();

        $product = Product::with('publisher')->find($id);
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('product.edit', ['product' => $product, 'publishers' => $publishers, 'categories' => $categories]);
    }
    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {


            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                'image.*' => 'required|image|mimes:jpg,jpeg,png|max:100000',

            ]);

            if ($validator->fails()) {

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($request->hasfile('image')) {
                $Product_Images = [];
                $images = $request->file('image');
                foreach ($images as $image) {

                    $path = public_path('image/product');
                    $image_name = time() . '_' . $image->getClientOriginalName();
                    $image->move($path, $image_name);
                    $Product_Images[] = $image_name;
                }
            } else {
                $Product_Images[] = 'noname.jpg';
            }

            $product = Product::find($id);
            if ($product != null) {

                $product->name = $request->name;
                $product->price = $request->price;
                $product->description = $request->description;
                $product->publisher_id = $request->publisher;
                $product->save();
                
                $product->category()->sync($request->input('categories'));
                Image::where('product_id', $id)->delete();

                // Save new images for the product
                foreach ($Product_Images as $image) {
                    $productImage = new Image();
                    $productImage->image = $image;
                    $productImage->product_id = $id;
                    $productImage->save();
                }

                return redirect()->route('product.index')
                    ->with('success', 'Game updated successfully');
            } else {
                return redirect()->route('product.index')
                    ->with('Error', 'Game not update');

            }
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        Image::where('product_id', $id)->delete();
        $product->delete();

        return redirect()->route('product.index')

            ->with('success', 'Game deleted successfully');
    }

}