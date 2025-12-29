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
        $totalOrdersToday = Order::whereBetween('created_at', [
            now()->startOfDay(),
            now()->endOfDay()
        ])->count();

        $todayOrders = Order::whereDate('created_at', today())->count();
        $yesterdayOrders = Order::whereDate('created_at', today()->subDay())->count();

        $thisMonthOrders = Order::where('status', 'delivered')
            ->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->count();


        $lastMonthOrders = Order::where('status', 'delivered')
            ->whereBetween('created_at', [
                Carbon::now()->subMonth()->startOfMonth(),
                Carbon::now()->subMonth()->endOfMonth()
            ])
            ->count();



        if ($lastMonthOrders == 0 && $thisMonthOrders > 0) {
            $salesPercentage = 100;
        } elseif ($lastMonthOrders > 0) {
            $salesPercentage = (($thisMonthOrders - $lastMonthOrders) / $lastMonthOrders) * 100;
        } else {
            $salesPercentage = 0;
        }

        $salesPercentage = round($salesPercentage, 2);

        if ($yesterdayOrders > 0) {
            $percentageChange = (($todayOrders - $yesterdayOrders) / $yesterdayOrders) * 100;
        } else {
            $percentageChange = $todayOrders > 0 ? 100 : 0;
        }

        $percentageChange = round($percentageChange, 2);

        $orderCount = Order::where('status', Order::STATUS_PENDING)->count();
        $totalQuantity = OrderItem::sum('quantity');
        $totalUsers    = User::count();
        $canceledOrders  = Order::where('status', 'canceled')->count();
        $productStock = DB::table('products')->sum('stock');
        $sizeStock    = DB::table('product_sizes')->sum('stock');
        $selisih      = $productStock - $sizeStock;

        $persentase = $productStock > 0
            ? round(($selisih / $productStock) * 100, 2)
            : 0;


        $salesDaily = Order::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->where('status', 'delivered')
            ->whereBetween('created_at', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth()
            ])
            ->groupBy('date')
            ->orderBy('date')
            ->pluck('total', 'date');



        $dates = [];
        $totals = [];

        $start = Carbon::now()->startOfMonth();
        $end   = Carbon::now()->endOfMonth();

        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
            $formatted = $date->format('Y-m-d');

            $dates[]  = $date->format('d');
            $totals[] = $salesDaily[$formatted] ?? 0;
        }


        return view('v_admin.v_dashboard.app', compact(
            'admin',
            'orderCount',
            'totalQuantity',
            'totalUsers',
            'canceledOrders',
            'productCount',
            'selisih',
            'persentase',
            'percentageChange',
            'totalOrdersToday',
            'thisMonthOrders',
            'salesPercentage',
            'dates',
            'totals'
        ));

    }

    public function ecommerce()
    {
        $admin = Auth::guard('admin')->user();

        $todayOrders      = Order::whereDate('created_at', Carbon::today())->count();
        $yesterdayOrders  = Order::whereDate('created_at', Carbon::yesterday())->count();
        $lastWeekOrders   = Order::whereBetween('created_at', [
            Carbon::now()->subWeek()->startOfDay(),
            Carbon::yesterday()->endOfDay()
        ])->count();
        $lastMonthOrders  = Order::whereBetween('created_at', [
            Carbon::now()->subMonth()->startOfDay(),
            Carbon::yesterday()->endOfDay()
        ])->count();
        $last90DaysOrders = Order::whereBetween('created_at', [
            Carbon::now()->subDays(90)->startOfDay(),
            Carbon::yesterday()->endOfDay()
        ])->count();

        $todayRevenue = OrderItem::whereHas('order', function ($query) {
            $query->whereDate('created_at', Carbon::today());
        })->sum(DB::raw('price * quantity'));

        $yesterdayRevenue = OrderItem::whereHas('order', function ($query) {
            $query->whereDate('created_at', Carbon::yesterday());
        })->sum(DB::raw('price * quantity'));

        $lastWeekRevenue = OrderItem::whereHas('order', function ($query) {
            $query->whereBetween('created_at', [
                Carbon::now()->subWeek()->startOfDay(),
                Carbon::yesterday()->endOfDay()
            ]);
        })->sum(DB::raw('price * quantity'));

        $lastMonthRevenue = OrderItem::whereHas('order', function ($query) {
            $query->whereBetween('created_at', [
                Carbon::now()->subMonth()->startOfDay(),
                Carbon::yesterday()->endOfDay()
            ]);
        })->sum(DB::raw('price * quantity'));

        $last90DaysRevenue = OrderItem::whereHas('order', function ($query) {
            $query->whereBetween('created_at', [
                Carbon::now()->subDays(90)->startOfDay(),
                Carbon::yesterday()->endOfDay()
            ]);
        })->sum(DB::raw('price * quantity'));

        $bestSellers = OrderItem::select('product_id', DB::raw('SUM(quantity) as total_sold'))
            ->groupBy('product_id')
            ->orderByDesc('total_sold')
            ->with('product')
            ->take(5)
            ->get();

        $orders = Order::with('items.product')
            ->latest()
            ->take(5)
            ->get();

        $salesHistory = OrderItem::with(['product', 'order'])
            ->whereHas('order', function ($q) {
                $q->where('status', 'delivered');
            })
            ->latest()
            ->take(3)
            ->get();

        $start = Carbon::now()->startOfMonth();
        $end = Carbon::now()->endOfMonth();

        $dailyOrders = Order::select(
            DB::raw('DATE(created_at) as date'),
            DB::raw('COUNT(*) as total_orders')
        )
            ->where('status', 'delivered')
            ->whereBetween('created_at', [$start, $end])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dailyItems = DB::table('order_items')
            ->select(
                DB::raw('DATE(orders.created_at) as date'),
                DB::raw('SUM(order_items.quantity) as items')
            )
            ->join('orders', 'order_items.order_id', '=', 'orders.id')
            ->where('orders.status', 'delivered')
            ->whereBetween('orders.created_at', [$start, $end])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dates = $dailyOrders->pluck('date'); 
        $orderTotals = $dailyOrders->pluck('total_orders'); 
        $itemTotals = $dailyItems->pluck('items'); 


        return view('v_admin.v_dashboard.app2', compact(
            'admin',
            'todayOrders',
            'yesterdayOrders',
            'lastWeekOrders',
            'lastMonthOrders',
            'last90DaysOrders',
            'todayRevenue',
            'yesterdayRevenue',
            'lastWeekRevenue',
            'lastMonthRevenue',
            'last90DaysRevenue',
            'bestSellers',
            'dates',
            'orderTotals',
            'itemTotals',
            'orders',
            'salesHistory'
        ));
    }


    public function users()
    {
        $admin = Auth::guard('admin')->user();
        $users = User::latest()->paginate(10);
        return view('v_admin.v_data.v_users.app', compact('admin', 'users'));
    }


    public function calendarEvents()
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

        $order->update([
            'status' => $request->status,
            'shipping_service' => $request->shipping_service,
            'tracking_number' => $request->tracking_number,
        ]);

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
    public function calendar()
    {
        $admin = Auth::guard('admin')->user();
        return view('v_admin.v_data.v_calendar.app', compact('admin'));
    }

    public function invoice()
    {
        $admin = Auth::guard('admin')->user();

        $orders = Order::with('user')
            ->latest()
            ->paginate(9);

        return view('v_admin.v_data.v_invoice.app', compact('orders', 'admin'));
    }
}
