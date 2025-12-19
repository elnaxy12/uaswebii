<?php

namespace App\Http\Controllers\Admin;

use App\Models\ShippingCalendar;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\OrderItem;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;

use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $productCount = Product::count();
        $totalOrders = Order::count();
        $orderCount = Order::where('status', Order::STATUS_PENDING)->count();
        $totalQuantity = OrderItem::sum('quantity');
        $totalUsers    = User::count();
        $canceledOrders  = Order::where('status', 'canceled')->count();


        return view('v_admin.v_dashboard.app', compact('admin', 'orderCount', 'totalQuantity', 'totalUsers', 'canceledOrders', 'productCount', 'totalOrders'));
    }

    public function ecommerce()
    {
        $admin = Auth::guard('admin')->user();

        // Best seller
        $bestSellers = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->take(10)
            ->get();

        // Recent orders
        $orders = Order::with('items.product')
            ->latest()
            ->take(5)
            ->get();

        return view('v_admin.v_dashboard.app2', compact('admin', 'bestSellers', 'orders'));
    }

    public function users()
    {
        $admin = Auth::guard('admin')->user();
        $users = User::latest()->paginate(10);
        return view('v_admin.v_data.v_users.app', compact('admin', 'users'));
    }

    public function calender()
    {
        $admin = Auth::guard('admin')->user();
        return view('v_admin.v_data.v_calender.app', compact('admin'));
    }


    public function calenderEvents()
    {
        $events = [];

        foreach (ShippingCalendar::all() as $item) {

            if ($item->shipped_at) {
                $events[] = [
                    'title' => 'Shipped: ' . $item->title,
                    'start' => $item->shipped_at->toDateString(),
                    'status' => 'shipped',
                ];
            }

            if ($item->estimated_arrival) {
                $events[] = [
                    'title' => 'ETA: ' . $item->title,
                    'start' => $item->estimated_arrival->toDateString(),
                    'status' => 'late',
                ];
            }

            if ($item->delivered_at) {
                $events[] = [
                    'title' => 'Delivered: ' . $item->title,
                    'start' => $item->delivered_at->toDateString(),
                    'status' => 'delivered',
                ];
            }
        }

        return response()->json($events);
    }


    public function pendingOrder(Request $request)
    {
        $admin  = Auth::guard('admin')->user();
        $status = $request->query('status');

        $orders = Order::with(['user', 'payment'])
            ->when(
                in_array($status, ['pending', 'shipped', 'waiting_payment', 'delivered', 'canceled']),
                fn ($q) => $q->where('status', $status)
            )
            ->latest()
            ->paginate(10);


        return view('v_admin.v_data.v_order.app', [
            'admin'           => $admin,
            'orders'          => $orders,
            'status'          => $status ?? null,
            'totalOrders'     => Order::count(),
            'pendingOrders'   => Order::where('status', 'pending')->count(),
            'waitingPaymentOrders'   => Order::where('status', 'waiting_payment')->count(),
            'shippedOrders'   => Order::where('status', 'shipped')->count(),
            'deliveredOrders' => Order::where('status', 'delivered')->count(),
            'canceledOrders'  => Order::where('status', 'canceled')->count(),
        ]);
    }


    public function updateOrderStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,waiting_payment,paid,shipped,delivered,canceled',
            'shipping_service' => 'nullable|string|max:50',
            'tracking_number' => 'nullable|string|max:100',
            'shipped_at' => 'nullable|date',
            'estimated_arrival' => 'nullable|date|after_or_equal:shipped_at',
        ]);

        // Update order
        $order->update([
            'status' => $request->status,
            'shipping_service' => $request->shipping_service,
            'tracking_number' => $request->tracking_number,
        ]);

        /* ===============================
           SHIPPED → BUAT / UPDATE KALENDER
        =============================== */
        if ($request->status === 'shipped') {
            ShippingCalendar::updateOrCreate(
                ['order_id' => $order->id],
                [
                    'user_id' => $order->user_id,
                    'title' => 'Order Delivery #' . $order->id,
                    'shipped_at' => $request->shipped_at ?? now(),
                    'estimated_arrival' => $request->estimated_arrival ?? now()->addDays(3),
                    'status' => 'shipped',
                ]
            );
        }

        /* ===============================
           DELIVERED → UPDATE KALENDER
        =============================== */
        if ($request->status === 'delivered') {
            if (!$order->shippingCalendar) {
                return back()->withErrors('Order belum dikirim');
            }

            $order->shippingCalendar->update([
                'delivered_at' => now(),
                'status' => 'delivered',
            ]);
        }

        return back()->with('success', 'Status order berhasil diubah');
    }


    // controller user
    public function dashboard()
    {
        $user = Auth::guard('web')->user();
        return view('v_user.v_dashboard.app', compact('user'));
    }

    public function wishlists()
    {
        $user = Auth::guard('web')->user();
        return view('v_user.v_wishlists.app', compact('user'));
    }

    public function cart()
    {
        $user = Auth::guard('web')->user();
        return view('v_user.v_cart.app', compact('user'));
    }

    public function order()
    {
        $user = Auth::guard('web')->user();
        return view('v_user.v_order.app', compact('user'));
    }
}
