<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;

class AdminController extends Controller
{
    // ==============================
    // Admin Dashboard & Profile
    // ==============================

    public function index()
    {
        if (session()->get('type') === 'Admin') {
            return view('Dashboard.index');
        }
        return redirect()->back();
    }

    public function adminProfile()
    {
        if (session()->get('type') === 'Admin') {
            $user = User::find(session()->get('id'));
            return view('Dashboard.adminProfile', compact('user'));
        }
        return redirect()->back();
    }

    // ==============================
    // Customer Management
    // ==============================

    public function customers()
    {
        if (session()->get('type') === 'Admin') {
            $customers = User::where('type', 'Customer')->get();
            return view('Dashboard.customers', compact('customers'));
        }
        return redirect()->back();
    }

    public function changeUserStatus($status, $id)
    {
        if (session()->get('type') === 'Admin') {
            $user = User::find($id);
            $user->status = $status;
            $user->save();

            return redirect()->back()->with('success', 'User status updated successfully.');
        }
        return redirect()->back();
    }

    // ==============================
    // Order Management
    // ==============================

    public function allorders()
    {
        if (session()->get('type') === 'Admin') {
            $orderItems = DB::table('order_items')
                ->join('products', 'order_items.productId', '=', 'products.id')
                ->select('products.title', 'products.picture', 'order_items.*')
                ->get();

            $orders = DB::table('users')
                ->join('orders', 'orders.customerId', '=', 'users.id')
                ->select('orders.*', 'users.fullname', 'users.email', 'users.status as userStatus')
                ->get();

            return view('Dashboard.allorders', compact('orders', 'orderItems'));
        }
        return redirect()->back();
    }

    public function changeOrderStatus($status, $id)
    {
        if (session()->get('type') === 'Admin') {
            $order = Order::find($id);
            $order->status = $status;
            $order->save();

            return redirect()->back()->with('success', 'Order status updated successfully.');
        }
        return redirect()->back();
    }

    // ==============================
    // Product Management
    // ==============================

    public function allproducts()
    {
        if (session()->get('type') === 'Admin') {
            $allproducts = Products::all();
            return view('Dashboard.allproducts', compact('allproducts'));
        }
        return redirect()->back();
    }

    public function AddNewProduct(Request $data)
    {
        if (session()->get('type') === 'Admin') {
            $product = new Products();
            $product->title = $data->input('title');
            $product->price = $data->input('price');
            $product->type = $data->input('type');
            $product->quantity = $data->input('quantity');
            $product->category = $data->input('category');
            $product->description = $data->input('description');

            if ($data->hasFile('file')) {
                $product->picture = $data->file('file')->getClientOriginalName();
                $data->file('file')->move('uploads/products/', $product->picture);
            }

            $product->save();
            return redirect()->back()->with('success', 'New product listed successfully.');
        }
        return redirect()->back();
    }

    public function updateProduct(Request $data)
    {
        if (session()->get('type') === 'Admin') {
            $product = Products::find($data->input('id'));
            $product->title = $data->input('title');
            $product->price = $data->input('price');
            $product->type = $data->input('type');
            $product->quantity = $data->input('quantity');
            $product->category = $data->input('category');
            $product->description = $data->input('description');

            if ($data->hasFile('file')) {
                $product->picture = $data->file('file')->getClientOriginalName();
                $data->file('file')->move('uploads/products/', $product->picture);
            }

            $product->save();
            return redirect()->back()->with('success', 'Product updated successfully.');
        }
        return redirect()->back();
    }

    public function deleteProduct($id)
    {
        if (session()->get('type') === 'Admin') {
            $product = Products::find($id);
            $product->delete();

            return redirect()->back()->with('success', 'Product deleted successfully.');
        }
        return redirect()->back();
    }
}
