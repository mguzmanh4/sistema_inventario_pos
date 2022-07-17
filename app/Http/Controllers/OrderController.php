<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Excel;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::with(['products','user'])->get();

        // dd($orders);

        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();

        $order = Order::select('id')->take(1)->orderBy('id','desc')->first();

        return view('orders.create',compact('products','order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request['products']);
        $order = new Order;
        $order->user_id = Auth::user()->id;
        $order->client_name = $request->client_name;
        $order->save();
        $order->products()->sync($this->mapProducts($request['products']));

        return redirect()->route('orders.index')->with('success', 'Product Created!!');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {

        $order = Order::with(['products','user'])
            ->where('id' , $order->id)
            ->first();

        // dd($order);

        return view('orders.view',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $order->load('products');
        $products = Product::get()->map(function($product) use ($order) {
            $product->value = data_get($order->products->firstWhere('id', $product->id), 'pivot.amount') ?? null;
            return $product;
        });

        return view('orders.edit', [
            'products' => $products,
            'order' => $order,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order = Order::findOrFail($order->id);
        $order->user_id = Auth::user()->id;
        $order->client_name = $request->client_name;
        $order->save();

        $order->products()->sync($this->mapProducts($request['products']));


        return redirect()->route('orders.index')->with('success', 'Product Created!!');


    }


    private function mapProducts($products)
    {

        return collect($products)->map(function ($i) {

            //update Products
            return ['amount' => $i];
        });
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        // return redirect()->back()->with('success', 'Order Deleted!!');
        return response()->json(['message' => 'Record deleted'], 200);

    }
    public function export()
    {
        return Excel::download(new OrdersExport, 'ordenes.xlsx');
    }
}
