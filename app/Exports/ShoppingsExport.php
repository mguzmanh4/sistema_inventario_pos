<?php

namespace App\Exports;

use App\Models\Shopping;
use Excel;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ShoppingsExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        return view('exports.shoppings', [
            'shoppings' => Shopping::all()
        ]);
    }
}
