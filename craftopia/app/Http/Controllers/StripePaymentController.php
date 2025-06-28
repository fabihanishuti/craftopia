<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Products; // ✅ You missed this import
use Stripe\Stripe;
use Stripe\Charge;

class StripePaymentController extends Controller
{
    public function stripe(Request $request)
    {
        // Store checkout info in session to pass to payment view
        session([
            'checkout_fullname' => $request->fullname,
            'checkout_phone' => $request->phone,
            'checkout_address' => $request->address,
            'checkout_bill' => $request->bill
        ]);

        return view('stripe');
    }

    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            Charge::create([
                'amount' => session('checkout_bill') * 100, // Convert dollars to cents
                'currency' => 'usd',
                'source' => $request->stripeToken,
                'description' => 'New Order Payment Received Successfully.',
            ]);

            if (session()->has('id')) {
                $order = new Order();
                $order->status = "Paid";
                $order->customerId = session()->get('id');
                $order->bill = session('checkout_bill'); // ✅ Use session instead of request
                $order->address = session('checkout_address');
                $order->fullname = session('checkout_fullname');
                $order->phone = session('checkout_phone');

                if ($order->save()) {
                    $carts = Cart::where('customerId', session()->get('id'))->get();

                    foreach ($carts as $item) {
                        $product = Products::find($item->productId);
                        if (!$product) continue;

                        $orderItem = new OrderItem();
                        $orderItem->productId = $item->productId;
                        $orderItem->quantity = $item->quantity;
                        $orderItem->price = $product->price;
                        $orderItem->orderId = $order->id;
                        $orderItem->save();

                        $item->delete();
                    }
                }

                return redirect('/shopping_cart')->with('success', 'Success! Your order has been placed successfully.');
            }

            return back()->with('error', 'Session expired. Please try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment failed: ' . $e->getMessage());
        }
    }
}
