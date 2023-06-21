<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{




public function index()

{

    $categories = Category::all();
    return view('admin.category.index', compact('categories'));

// $categories = Category::latest()->paginate(5);

// return view('category.index', compact('categories'))

// ->with('i', (request()->input('page', 1) - 1) * 5);

}

public function create()

{

return view('admin.category.create');

}

public function store(Request $request)

{

if ($request->isMethod('POST')) {

$validator = Validator::make($request->all(), [

'category_name' => 'required',

'category_description' => 'required'

]);

if ($validator->fails()) {

return redirect()->back()

->withErrors($validator)

->withInput();

}

$newCategory = new Category();

$newCategory->category_name = $request->category_name;

$newCategory->category_description = $request->category_description;

$newCategory->save();

return redirect()->route('category.index')

->with('success', 'Category created successfully.');

}

}

public function show($id)

{

$category = Category::find($id);

return view('admin.category.show', ['category' => $category]);

}

public function edit($id)

{

$category = Category::find($id);

return view('admin.category.edit', ['category' => $category]);

}

public function update(Request $request, $id)

{

if ($request->isMethod('POST')) {

$validator = Validator::make($request->all(), [

'category_name' => 'required',

'category_description' => 'required',

]);

if ($validator->fails()) {

return redirect()->back()

->withErrors($validator)

->withInput();

}

$category = Category::find($id);

if ($category != null) {

$category->category_name = $request->name;

$category->category_description = $request->description;

$category->save();

return redirect()->route('category.index')

->with('success', 'Category updated successfully');

}

else

{

return redirect()->route('category.index')

->with('Error', 'Category not update');

}

}

}

public function destroy($id)

{

$category = Category::find($id);

$category->delete();

return redirect()->route('category.index')

->with('success', 'Category deleted successfully');

}

}

