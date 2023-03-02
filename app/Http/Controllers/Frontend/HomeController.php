<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe;


class HomeController extends Controller
{
        //-------home index view-------
        public function index(){
            $products = Product::paginate(6);
            return view('frontend.index', compact('products'));
        }
        //-------redirect condition view-------
        public function redirect(){
            $user_type = Auth::user()->user_type;
            if($user_type == "1"){
                return view('backend.admin.index');
            }else{
                $products = Product::paginate(6);
                return view('frontend.index', compact('products'));
            }
        }
        //-------product details-------
        public function product_details($id){
            $product = Product::find($id);
            return view('frontend.product_details', compact('product'));
        }
        //-------add cart-------
        public function add_cart(Request $request, $id){
            if(Auth::id()){
             $user = Auth::user();
             $product = Product::find($id);
             //create card
             $card = new Cart();
             //user
             $card->name = $user->name;
             $card->email = $user->email;
             $card->phone = $user->phone;
             $card->address = $user->address;
             $card->user_id = $user->id;
             //product
             $card->product_title = $product->title;
             if($product->discount_price!=null){
                $card->price = $product->discount_price * $request->quantity;
             }else{
                $card->price = $product->price * $request->quantity;
             }
             $card->quantity = $request->quantity;
             $card->product_id = $product->id;
             $card->image = $product->image;
             $card->save();
             return back()->with('message', "Add Card Successful!");
            }else{
                return redirect(route('login'));
            }
        }
        //-------show cart-------
        public function show_cart(){
           if(Auth::id()){
            $login_id = Auth::user()->id;
            $carts = Cart::where('user_id', $login_id)->get();
            return view('frontend.show_cart', compact('carts'));
           }else{
            return redirect(route('login'));
           }
        }
         //-------destroy card-------
        public function destroy_cart($id){
            $cart = Cart::find($id);
            $cart->delete();
            return back();
        }
        //-------cash order-------
        public function cash_order(){
             $login_id = Auth::user()->id;
             $carts = Cart::where('user_id', $login_id)->get();
             foreach($carts as $cart){
                $order = new Order();
                //user
                $order->name = $cart->name;
                $order->email = $cart->email;
                $order->phone = $cart->phone;
                $order->address = $cart->address;
                $order->user_id = $cart->user_id;
                //product
                $order->product_title = $cart->product_title;
                $order->quantity = $cart->quantity;
                $order->price = $cart->price;
                $order->image = $cart->image;
                //status
                $order->payment_status = 'cash on delivery';
                $order->delivery_status = 'processing';
                $order->save();
                $cart_id = $cart->id;
                $card_data = Cart::find($cart_id);
                $card_data->delete();
             }
             return back()->with('message', 'Order Submit Successful!');

         }
        //-------stripe-----
        public function stripe($price){
            return view('frontend.stripe',compact('price'));
        }
        //-------stripe payment--------
        public function stripe_post(Request $request, $price){
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

            Stripe\Charge::create ([
                    "amount" => 100 * 100,
                    "currency" => "usd",
                    "source" => $request->stripeToken,
                    "description" => "Thanks For Payment!"
            ]);

            Session::flash('message', 'Payment successful!');

            return back();

        }

}
