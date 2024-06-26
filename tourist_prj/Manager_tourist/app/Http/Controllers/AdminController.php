<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tour;
use App\Models\Post;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $tours = Tour::count();
        $orders = Order::count();
        $posts = Post::count();
        $users = User::count();
        $orderCus = Order::select('user_id')->distinct()->get();
        // Tổng số khách hàng
        $customers = [];
        foreach ($orderCus as $cus) {
            $customerOrder = $cus->user;
            array_push($customers, $customerOrder);
        }
        $amountCustomer = count($customers);

        $today = Carbon::now()->toDateString();
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        // Truy vấn doanh thu theo ngày
        $dailyRevenue = Payment::whereDate('p_time', $today)
            ->sum('p_price');

        $monthlyRevenue = Payment::whereMonth('p_time', $currentMonth)
            ->whereYear('p_time', $currentYear)
            ->sum('p_price');

        $yearlyRevenue = Payment::whereYear('p_time', $currentYear)
            ->sum('p_price');


        // dd($yearlyRevenue);

        $dataAll = [
            'tours' => $tours,
            'orders' => $orders,
            'posts' => $posts,
            'users' => $users,
            'customers' => $amountCustomer,
            'dailyRevenue' => $dailyRevenue,
            'monthlyRevenue' => $monthlyRevenue,
            'yearlyRevenue' => $yearlyRevenue,
        ];
        return view('dashboard', compact('dataAll'));
    }
}
