<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Trait\DeleteModalTrait;

class OrderManagerController extends Controller
{
    use DeleteModalTrait;
    private $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function listOrderTour()
    {
        $orderCustomers = $this->order->latest()->paginate(5);
        return view('admin.order.index', compact('orderCustomers'));
    }

    public function editOrderTour($id)
    {
        $orders = $this->order->find($id);
        return response()->json([
            'code' => 200,
            'order' => $orders,
        ], 200);
    }

    public function updateOrderTour(Request $request)
    {
        $orderId = $request->input('orderId');
        if(empty($orderId)){
            return view('errors.403');
        }
        $orders = $this->order->find($orderId);
        $orders->update([
            'total_price' => $request->total_price,
            'total_deposit' => $request->total_deposit,
            'total_person' => $request->total_person,
        ]);
        return redirect()->route('order.tour')->with('ok', 'Đã sửa đơn hàng thành công !');
    }

    public function destroySchedule($id){
        if (empty($id)) {
            return view('errors.403');
        }
        return $this->deleteModalTrait($id, $this->order);
    }
}
