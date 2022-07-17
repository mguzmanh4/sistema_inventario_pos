<?php

namespace App\Http\Controllers;

use App\Exports\ShoppingsExport;
use App\Models\Shopping;
use App\Http\Requests\StoreShoppingRequest;
use App\Http\Requests\UpdateShoppingRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Excel;

class ShoppingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shoppings = Shopping::all();

        return view('shoppings.index', compact('shoppings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        return view('shoppings.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShoppingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreShoppingRequest $request)
    {
        // dd($request);
        $shopping = Shopping::create($request->validated());


        $productFound = Product::select('stock')->where('id', $request->product_id)->first();

        $stockUpdate = $productFound->stock + $request->purchased_amount;
        // dd($stockUpdate);
        $productUpdate = Product::where('id', $request->product_id)->update(['stock' => $stockUpdate]);;


        // dd($category);
        return redirect()->route('shoppings.index')->with('success', 'Shopping Created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function show(Shopping $shopping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shopping $shopping)
    {

        $shopping = Shopping::with('product')->where('id',$shopping->id)->first();

        // dd($shopping);
        $products = Product::all();

        return view('shoppings.edit',compact('shopping','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShoppingRequest  $request
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateShoppingRequest $request, Shopping $shopping)
    {
        // dd($request);
        $shopping->update($request->validated());
        return redirect()->route('shoppings.index')->with('success', 'Shopping Created!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shopping  $shopping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shopping $shopping)
    {
        $shopping->delete();

        // return redirect()->back()->with('success', 'Product Deleted!!');
        return response()->json(['message' => 'Record deleted'], 200);
    }

    public function export()
    {
        return Excel::download(new ShoppingsExport, 'compras.xlsx');
    }

}
