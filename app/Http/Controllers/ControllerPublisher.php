<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Image;
use App\Models\Publisher;

class ControllerPublisher extends Controller
{
   
    public function index()
    {
        $publishers = Publisher::latest()->paginate(5);
        return view('publisher.index', compact('publishers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    
    public function create()
    {
        return view('publisher.create');
    }

  
    public function store(Request $request)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [

                'name' => 'required',

                'country' => 'required'

            ]);

            if ($validator->fails()) {

                return redirect()->back()

                    ->withErrors($validator)

                    ->withInput();

            }

            $newPublisher = new Publisher();

            $newPublisher->name = $request->name;

            $newPublisher->country = $request->country;

            $newPublisher->save();

            return redirect()->route('publisher.index')

                ->with('success', 'Publisher created successfully.');
        }
    }


    public function show($id)
    {
        $publisher = Publisher::find($id);

        return view('publisher.show', ['publisher' => $publisher]);
    }


    public function edit($id)
    {
        $publisher = Publisher::find($id);

        return view('publisher.edit', ['publisher' => $publisher]);
    }


    public function update(Request $request, $id)
    {
        if ($request->isMethod('POST')) {

            $validator = Validator::make($request->all(), [

                'name' => 'required',

                'country' => 'required',

            ]);

            if ($validator->fails()) {

                return redirect()->back()

                    ->withErrors($validator)

                    ->withInput();

            }

            $publisher = Publisher::find($id);

            if ($publisher != null) {

                $publisher->name = $request->name;

                $publisher->country = $request->country;

                $publisher->save();

                return redirect()->route('publisher.index')

                    ->with('success', 'publisher updated successfully');

            } else {

                return redirect()->route('publisher.index')

                    ->with('Error', 'Publisher not update');

            }

        }
    }


    public function destroy($id)
    {
        $publisher = Publisher::find($id);
        $publisher->delete();
        return redirect()->route('publisher.index')
            ->with('success', 'Publisher deleted successfully');
    }
}