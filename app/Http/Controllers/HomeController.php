<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;

use App\Models\Comment;

use Session;
use Stripe;

class HomeController extends Controller
{


    public function index()
    {
        $product = Product::paginate(3);

        $comment=comment::all();
        return view('home.userpage', compact('product','comment'));
    }

    public function redirect()
    {


        $usertype = Auth::user()->usertype;
        //user type come form data base


        if ($usertype == '1') {

            $total_product = product::all()->count();
            $total_order = order::all()->count();
            $total_user = user::all()->count();

            $order = order::all();
            $total_revenue = 0;

            foreach ($order as $order) {
                $total_revenue = $total_revenue + $order->price;
            }

            $total_deliverd = order::where('delivery_status', '=', 'deliverd')->get()->count();

            $total_processing = order::where('delivery_status', '=', 'processing')->get()->count();

            return view('admin.home', compact('total_product', 'total_order', 'total_user', 'total_revenue', 'total_deliverd', 'total_processing'));
        } 
        else {
            $product = Product::paginate(3);
            
            $comment=comment::all();

            // dd($comment->name);


            return view('home.userpage', compact('product','comment'));
        }
    }

    public function product_details($id)
    {
        $product = product::find($id);

        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id())  // cheking user login or not
        {
            $user = Auth::user(); // jai user login korecha tar data naua holo
            //    dd($user);
            $product = product::find($id); // product.blade.php te from submit korar somoy
            // unique product ar jai id ta chilo oi id ta diya data base find kora hoccha
            // dd($product);
            $cart = new cart;
            //USER PART
            $cart->name = $user->name; // cart tabel name vcoloum a spefic user name lekha holo
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->user_id = $user->id;

            //pRODUCT PART

            $cart->product_tittle = $product->tittel;

            // if($product->discount_price!=null)

            // {
            //     $cart->price= $product->discount_price * $request->quantity;
            // }

            // else{
            $cart->price = $product->price * $request->quantity;
            // s



            $cart->image = $product->image;

            $cart->product_id = $product->id;

            $cart->quantity = $product->quantity;

            $cart->save();

            return redirect()->back();
        } else {
            return redirect('login'); // by default laravel create this login for redirect
        }
    }

    public function show_cart()
    {
        if (Auth::id()) {
            $id = Auth::user()->id; // login user id
            $cart = Cart::where('user_id', '=', $id)->get();
            return view('home.showcart', compact('cart'));
        } else {
            return redirect('login');
        }
    }
    public function remove_cart($id)
    {
        $cart = cart::find($id);

        $cart->delete();

        return redirect()->back();
    }
    public function cash_order()
    {
        $user = Auth::user();
        $userid = $user->id;
        $data = cart::where('user_id', '=', $userid)->get();


        foreach ($data as $data) {

            $order = new order;

            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $data->address;
            $order->user_id = $data->user_id;
            $order->product_tittle = $data->product_tittle;
            $order->price = $data->price;
            $order->quantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'cash on delivery';

            $order->delivery_status = 'processing';
            $order->save();

            $cart_id = $data->id;

            $cart = cart::find($cart_id);
            $cart->delete();
        }
        return redirect()->back()->with('message', 'we recived ur order');
    }


    // public function stripe($totalprice)
    // {

    //     return view('home.stripe',compact('totalprice'));
    // }

    public function stripe($totalprice)
    {
        return view('home.stripe', compact('totalprice'));
    }

    // public function stripePost(Request $request,$totalprice)
    // {
    //     Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

    //     Stripe\Charge::create ([
    //             "amount" =>$totalprice * 100,
    //             "currency" => "usd",
    //             "source" => $request->stripeToken,
    //             "description" => "Test payment from itsolutionstuff.com." 
    //     ]);

    //     Session::flash('success', 'Payment successful!');
    //     // return redirect()->back()->with('success','Payment successful!');              
    //     // return back();
    // }

    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            "amount" => $totalprice * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        return redirect()->back()->with('success', 'Payment successful!');

        // return back();

    }


    public function show_order()
    {
        if(Auth::id())
        {
            $user=Auth::user();
            $userid=$user->id;

            $order=order::where('user_id','=',$userid)->get();

           
            return view('home.order',compact('order'));
        }
        else{
            return redirect('login');
        }
    }
    
    public function cancle_order($id)
    {
        $order=order::find($id);
        $order->delivery_status='you can not order';
        $order->save();

        return redirect()->back();
    }

    public function add_comment(Request $request)

    {
        if(Auth::id())
        {
            $comment=new comment;
            //new comment is table name

            $comment->name=Auth::user()->name;
            
            $comment->user_id=Auth::user()->id;

            $comment->comment = $request->comment;

            $comment->save();

            return redirect()->back();


        }
        else
        {
            return redirect('login');
        }


        
    }
}
