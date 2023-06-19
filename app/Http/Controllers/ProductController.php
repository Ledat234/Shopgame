<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Product;
use App\Models\Image;
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
    public function create()
    {
        $publishers = Publisher::all();

        return view('product.create', ['publishers' => $publishers]);
    }
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [

                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
                
            ]);

            if ($validator->fails()) {

                return redirect()->back()

                    ->withErrors($validator)

                    ->withInput();

            }

            if($request->hasfile('image')){
                $Product_Images=[];
                $images =$request->file('image');
                foreach($images as $image){
                    $path =public_path('product/image');
                    $image_name =time().'_'.$image->getClientOriginalName();
                    $image->move($path,$image_name);
                    $Product_Images[] =$image_name;
                }
            }
            
            
            $newProduct = new Product();
            $newProduct->name = $request->name;
            $newProduct->price = $request->price;
            $newProduct->description = $request->description;
            
            $newProduct->publisher_id = $request->publisher;

            $newProduct->save();

            $lastInserttedID =$newProduct->id;
            foreach ($Product_Images as $productimage) {
                $newProductImage =new Image();
                $newProductImage->path=$productimage;
                $newProductImage->product_id=$lastInserttedID;
                $newProductImage->save();



            }

            return redirect()->route('product.index')

                ->with('success', 'Game Add successfully.');
        }
        
    }
    public function show($id)
    {
        $product = Product::find($id);

        return view('product.show', ['product' => $product]);
    }
    public function edit($id)
    {
        $publishers = Publisher::all();

        $product = Product::with('publisher')->find($id);

        return view('product.edit', ['product' => $product, 'publishers' => $publishers]);
    }
    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'price' => 'required',
                'description' => 'required',
            ]);

            if ($validator->fails()) {

                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();

            }

           

            $product = Product::find($id);
            if ($product != null) {
                $product->name = $request->name;
                $product->price = $request->price;
                $product->description = $request->description;
                $product->publisher_id = $request->publisher;
              
                $product->save();
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

        

        $product->delete();

        return redirect()->route('product.index')

            ->with('success', 'Game deleted successfully');
    }

}
