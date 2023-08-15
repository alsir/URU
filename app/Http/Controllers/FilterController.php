<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Database\Eloquent\Builder;

class FilterController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::orderBy('id', 'desc')
            ->when(
                $request->date_from && $request->date_to,
                function (Builder $builder) use ($request) {
                    $builder->whereBetween(
                        DB::raw('DATE(created_at)'),
                        [
                            $request->date_from,
                            $request->date_to
                        ]
                    );
                }
            )->paginate(5);
        $order_count= $orders->count();
        $order_sum = $orders->sum('total_paid');
        $orders_by_sells=$orders->where('order_type',0)->count();
        $orders_by_projects=$orders->where('order_type',1)->count();
        return view('admin.order.index')->with('orders',$orders)
        ->with('order_sum',$order_sum)
        ->with('order_count',$order_count)
        ->with('orders_by_sells',$orders_by_sells)
        ->with('orders_by_projects',$orders_by_projects);
    }
}
