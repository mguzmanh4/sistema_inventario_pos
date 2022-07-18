<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function selling_per_month_view()
    {
        return view('reports.selling_per_month.index');
    }

    public function selling_per_month($year)
    {

        $labelMonthssArray =  $this->get_list_of_months( $year . "-01-01 00:00:01" , $year . "-12-31 23:59:59");

                //SELECT year(orders.created_at),month(orders.created_at), count(*) ,
        //sum( products.purchase_price * order_product.amount ) as Total , orders.created_at FROM `orders` inner join order_product on orders.id = order_product.order_id inner join products on order_product.product_id = products.id group by year(orders.created_at),month(orders.created_at),orders.created_at;


        $sells = DB::select(
            'SELECT YEAR(orders.created_at) as Year, MONTH(orders.created_at) as Month ,sum( products.purchase_price * order_product.amount ) as Total FROM
                        orders inner join order_product on orders.id = order_product.order_id inner join products on order_product.product_id = products.id WHERE  orders.created_at >= ? AND orders.created_at <= ? group by year(created_at),month(created_at) order by year(created_at),month(created_at)',
            [$year . "-01-01 00:00:00", $year . "-12-31 23:59:59"]
        );

        $mesesAndDataCompleted = [];
        foreach ($labelMonthssArray as  $labeMonth) {
            $isMonth = false;
            foreach ($sells as  $sell) {
                if ($labeMonth['monthNumber'] == $sell->Month && $labeMonth['yearNumber'] == $sell->Year) {
                    $mesesAndDataCompleted[] =  $sell->Total;
                    $isMonth = true;
                }
            }
            if (!$isMonth) {
                $mesesAndDataCompleted[] =  0;
            }
        }

        $listSells = array();
        $SellDetail = new stdClass();

        $SellDetail->labels = collect($labelMonthssArray)->pluck('label');
        $SellDetail->resultsCompleted  = $mesesAndDataCompleted;

        array_push($listSells, $SellDetail);
        return $listSells;

    }

    public function most_sell_view()
    {
        return view('reports.most_sell.index');
    }

    public function most_sell($dateFrom, $dateTo )
    {
        // SELECT YEAR(orders.created_at) as Year, MONTH(orders.created_at) as Month , order_product.product_id,products.name, sum( order_product.amount ) as Total FROM orders inner join order_product on orders.id = order_product.order_id inner join products on order_product.product_id = products.id WHERE  orders.created_at >= '2022-01-01 00:00:00' AND orders.created_at <= '2022-01-31 23:59:59'
        // group by YEAR(orders.created_at) , month(orders.created_at), order_product.product_id ORDER BY Month ASC;

        $sells = DB::select(
            'SELECT YEAR(orders.created_at) as Year, MONTH(orders.created_at) as Month , order_product.product_id,products.name, sum( order_product.amount ) as Total FROM orders inner join order_product on orders.id = order_product.order_id inner join products on order_product.product_id = products.id WHERE orders.created_at >= ? AND orders.created_at <= ? group by YEAR(orders.created_at) , month(orders.created_at), order_product.product_id ORDER BY Month ASC',
            [$dateFrom . " 00:00:00", $dateTo . " 23:59:59"]
        );

        return $sells;
    }


    public function get_list_of_months($date1, $date2)
    {
        $time1  = strtotime($date1);
        $time2  = strtotime($date2);
        $my     = date('mY', $time2);

        // $months = array(date('F', $time1));
        $months = array([
            "yearNumber"  => date('Y', $time1),
            "monthLabel"  => date('F', $time1),
            "monthNumber"  => date('m', $time1),
            "label"  => date('F', $time1),
        ]);

        while ($time1 < $time2) {
            $time1 = strtotime(date('Y-m-d', $time1) . ' +1 month');
            if (date('mY', $time1) != $my && ($time1 < $time2))
                $months[] = [
                    "yearNumber"  => date('Y', $time1),
                    "monthLabel"  => date('F', $time1),
                    "monthNumber"  => date('m', $time1),
                    "label"  => date('F', $time1),
                ];
        }

        // $months[] = date('F', $time2);
        $months[] = [
            "yearNumber"  => date('Y', $time2),
            "monthLabel"  => date('F', $time2),
            "monthNumber"  => date('m', $time2),
            "label"  => date('F', $time2),
        ];
        return $months;
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
