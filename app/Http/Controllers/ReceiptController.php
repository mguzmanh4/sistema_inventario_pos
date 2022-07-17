<?php

namespace App\Http\Controllers;

use App\Models\Company;
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

        // dd( $order);
        $company = Company::where('user_id',$order->user_id)->orderBy('id','desc')->first();

        $date = Carbon::now();
        $date = $date->format('l jS \\of F Y h:i:s A');

        // dd($date);
        $data = [
            "date" => Carbon::now(),
            "products" => $order->products,
            "order_id" => $order->id,
            "client_name" => $order->client_name,
            "date" =>  $date,
            "user" => $order->user,
            "company" => $company
        ];
        // dd($data);

        $pdf = PDF::loadView('receipt/index', $data);

        $fileName = "Recibo-"."".$order->user->name ."-". Carbon::now()->format('m-d-Y').".pdf";

        return $pdf->download($fileName);

        // dd($order_id);
    }
}
