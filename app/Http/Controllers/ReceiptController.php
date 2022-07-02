<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PDF;


class ReceiptController extends Controller
{
    public function donwloadPdf($order_id)
    {

        $order = Order::with(['products', 'user'])
            ->where('id', $order_id)
            ->first();

        $date = Carbon::now();
        $date = $date->format('l jS \\of F Y h:i:s A');

        // dd($date);
        $data = [
            "date" => Carbon::now(),
            "products" => $order->products,
            "order_id" => $order->id,
            "date" =>  $date,
            "user" => $order->user,
        ];
        // dd($data);

        $pdf = PDF::loadView('receipt/index', $data);

        $fileName = "Receipt-"."".$order->user->name ."-". Carbon::now()->format('m-d-Y').".pdf";

        return $pdf->download($fileName);

        // dd($order_id);
    }
}
