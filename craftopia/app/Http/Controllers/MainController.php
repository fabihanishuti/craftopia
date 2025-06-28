<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Products;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;

class MainController extends Controller
{
    // ========================== Home & Static Pages ==========================

    public function welcome()
    {
        return view('welcome', [
            'bestSellers' => Products::where('type', 'Best Sellers')->get(),
            'newArrivals' => Products::where('type', 'New Arrivals')->get(),
            'hotSales' => Products::where('type', 'Hot Sales')->get()
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function blog()
    {
        return view('blog');
    }

    public function contact()
    {
        return view('contact');
    }

    // ========================== Product Related ==========================

    public function filterProducts($type)
    {
        $validTypes = ['Best Sellers', 'New Arrivals', 'Hot Sales'];

        if (!in_array($type, $validTypes)) {
            abort(404);
        }

        $products = Products::where('type', $type)->get();

        return view('partials.product-grid', [
            'products' => $products,
            'type' => $type
        ]);
    }

    public function productDetail($id)
    {
        $product = Products::findOrFail($id);
        $related = Products::where('type', $product->type)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('detail', compact('product', 'related'));
    }

    public function products()
    {
        return view('products');
    }

    public function showProducts()
    {
        $artProducts = Products::where('category', 'Art & Paintings')->get();
        $decorProducts = Products::where('category', 'Home Decor')->get();
        $accessories = Products::where('category', 'Accessories')->get();
        $ecoCrafts = Products::where('category', 'Eco-Friendly Crafts')->get();

        return view('products', compact('artProducts', 'decorProducts', 'accessories', 'ecoCrafts'));
    }



    public function art()
    {
        $artProducts = Products::where('category', 'Art & Paintings')->get();
        // Adjust this query as needed

        return view('art', compact('artProducts'));
    }

    public function home_decor()
    {
        $decorProducts = Products::where('category', 'Home Decor')->get();
        // Adjust this query as needed

        return view('home_decor', compact('decorProducts'));
    }

    public function accessories()
    {
        $accessories = Products::where('category', 'Accessories')->get();
        // Adjust this query as needed

        return view('accessories', compact('accessories'));
    }

    public function eco_craft()
    {
        $ecoCrafts = Products::where('category', 'Eco-Friendly Crafts')->get();
        // Adjust this query as needed

        return view('eco_craft', compact('ecoCrafts'));
    }



    public function product_detail()
    {
        return view('product_detail');
    }

    // ========================== Cart ==========================

    public function shopping_cart()
    {
        if (!session()->has('id')) {
            return redirect()->route('signin')->with('error', 'Please sign in to view your cart.');
        }

        $cartItems = DB::table('products')
            ->join('carts', 'carts.productId', '=', 'products.id')
            ->select(
                'products.title',
                'products.price',
                'products.picture',
                'products.quantity as pQuantity',
                'carts.id as cartId',
                'carts.quantity'
            )
            ->where('carts.customerId', session()->get('id'))
            ->get();

        $total = $cartItems->sum(fn($item) => $item->price * $item->quantity);

        return view('shopping_cart', compact('cartItems', 'total'));
    }

    public function addToCart(Request $request)
    {
        if (session()->has('id')) {
            $validated = $request->validate([
                'id' => 'required|integer|exists:products,id',
                'quantity' => 'required|integer|min:1',
            ]);

            Cart::create([
                'productId' => $validated['id'],
                'quantity' => $validated['quantity'],
                'customerId' => session()->get('id')
            ]);

            return redirect()->back()->with('success', 'Item added to cart.');
        }

        return redirect('signin')->with('error', 'Please sign in to continue.');
    }

    public function updateAllCart(Request $request)
    {
        $request->validate([
            'cartIds' => 'required|array',
            'quantities' => 'required|array',
            'quantities.*' => 'integer|min:1',
            'cartIds.*' => 'exists:carts,id',
        ]);

        foreach ($request->cartIds as $index => $cartId) {
            DB::table('carts')->where('id', $cartId)->update([
                'quantity' => $request->quantities[$index]
            ]);
        }

        return redirect()->back()->with('success', 'Cart updated successfully!');
    }

    public function deleteCartItem($id)
    {
        DB::table('carts')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    // ========================== Checkout & Orders ==========================

    public function checkout(Request $data)
    {
        if (!session()->has('id')) {
            return redirect('signin')->with('error', 'Please sign in to continue.');
        }

        $order = new Order([
            'status' => 'Pending',
            'customerId' => session()->get('id'),
            'bill' => $data->input('bill'),
            'address' => $data->input('address'),
            'fullname' => $data->input('fullname'),
            'phone' => $data->input('phone'),
        ]);

        if ($order->save()) {
            $carts = Cart::where('customerId', session()->get('id'))->get();

            foreach ($carts as $item) {
                $product = Products::find($item->productId);

                OrderItem::create([
                    'productId' => $item->productId,
                    'quantity' => $item->quantity,
                    'price' => $product->price,
                    'orderId' => $order->id
                ]);

                $item->delete();
            }

            return redirect()->back()->with('success', 'Your order has been placed successfully.');
        }

        return redirect()->back()->with('error', 'Failed to place the order.');
    }

    public function myOrders()
    {
        if (!session()->has('id')) {
            return redirect('signin');
        }

        $orders = Order::where('customerId', session()->get('id'))->get();

        foreach ($orders as $order) {
            $order->items = DB::table('products')
                ->join('order_items', 'order_items.productId', 'products.id')
                ->select('products.title', 'products.picture', 'order_items.*')
                ->where('order_items.orderId', $order->id)
                ->get();
        }

        return view('orders', compact('orders'));
    }

    // ========================== Auth ==========================

    public function signin()
    {
        return view('signin');
    }

    public function signup()
    {
        return view('signup');
    }


    public function signinUser(Request $data)
    {
        $user = User::where('email', $data->input('email'))->first();

        // First, check if user exists
        if (!$user) {
            return redirect('signin')->with('error', 'Email or Password is incorrect.');
        }

        // Then check if user is blocked
        if ($user->status == "Blocked") {
            return redirect('signin')->with('error', 'Your account has been blocked.');
        }

        // Check if password is valid
        if (Hash::check($data->input('password'), $user->password)) {
            session()->put('id', $user->id);
            session()->put('type', $user->type);

            if ($user->type == 'Customer') {
                return redirect('/');
            } elseif ($user->type == 'Admin') {
                return redirect('/admin');
            }
        }

        // Wrong password
        return redirect('signin')->with('error', 'Email or Password is incorrect.');
    }



    public function signupUser(Request $data)
    {
        $validated = $data->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'file' => 'nullable|image|max:1024',
        ]);

        $newUser = new User([
            'fullname' => $data->input('fullname'),
            'email' => $data->input('email'),
            'password' => Hash::make($data->input('password')),
            'type' => 'Customer'
        ]);

        if ($data->hasFile('file')) {
            $fileName = time() . '_' . $data->file('file')->getClientOriginalName();
            $data->file('file')->move(public_path('uploads/profiles'), $fileName);
            $newUser->picture = $fileName;
        }

        if ($newUser->save()) {
            return redirect('signin')->with('success', 'Your account has been created.');
        }

        return redirect()->back()->with('error', 'Error creating your account.');
    }

    public function signout()
    {
        session()->flush();
        return redirect()->route('signin');
    }

    // ========================== User Settings ==========================

    public function settings()
    {
        if (session()->has('id')) {
            $user = User::find(session()->get('id'));
            return view('settings', compact('user'));
        }

        return redirect('signin');
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'file' => 'nullable|image|max:2048',
        ]);

        $user = User::find(session()->get('id'));
        $user->fullname = $request->input('fullname');
        $user->password = Hash::make($request->input('password'));

        if ($request->hasFile('file')) {
            $filename = time() . '_' . $request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('uploads/profiles'), $filename);
            $user->picture = $filename;
        }

        if ($user->save()) {
            return redirect()->back()->with('success', 'Your account has been updated.');
        }

        return redirect()->back()->with('error', 'Failed to update account.');
    }
}
