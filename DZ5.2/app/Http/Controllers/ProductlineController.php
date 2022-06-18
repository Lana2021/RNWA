<?php

namespace App\Http\Controllers;

use App\Models\Productline;
use Illuminate\Http\Request;

class ProductlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productlines = Productline::paginate(10);

        return view('productlines.index',compact('productlines'))
            ->with(request()->input('page'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productlines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'productLine' => 'required',
            'textDescription' => 'required'
        ]);

        Productline::create($request->all());

        return redirect()->route('productlines.index')
                        ->with('success','Productline created successfully.');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productline  $productline
     * @return \Illuminate\Http\Response
     */
    public function show(Productline $productline)
    {
        return view('productlines.show',compact('productline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productline  $productline
     * @return \Illuminate\Http\Response
     */
    public function edit(Productline $productline)
    {
        return view('productlines.edit',compact('productline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productline  $productline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Productline $productline)
    {
        $request->validate([
            'textDescription' => 'required'
        ]);

        $productline->update($request->all());

        return redirect()->route('productlines.index')
                        ->with('success','Productline updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productline  $productline
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productline $productline)
    {
        $productline->delete();

        return redirect()->route('productlines.index')
                        ->with('success','Productline deleted successfully');
    }
}
