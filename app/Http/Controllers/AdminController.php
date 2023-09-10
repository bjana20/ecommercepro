<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;
use PDF;
use Notification;

use App\Notifications\SendEmailNotification;

class AdminController extends Controller
{
    public function view_catagory()
    {
      
        $data=catagory::all();// collect dats from the catagory tabel
        return view('admin.catagory',compact('data'));
    }

    public function add_catagory(Request $request)
    {
      $data= new catagory;  
      $data->catagory_name=$request->name;
      $data->save();

      return redirect()->back()->with('message','catagory added sucessfully');

    }
    public function delete_catagory($id)
  
    {
      $data=catagory::find($id);
      $data->delete();
      return redirect()->back()->with('dmessage','catagory  deleted sucessfully');
    }

    public function view_product()
    {
      $catagory=catagory::all();// collecct data through app/model/catagory 
      //collect dats from the catagory tabel and save to the variable $catagory
    
      return view('admin.product',compact('catagory'));
    }

    public function add_product(Request $request)
    {
      $product=new product();// we collect all the data FROM  useing form now we havee send the all data to data base
      $product->tittel=$request->tittle;

      $product->description=$request->description;


      $product->catagory=$request->catagory;

      $product->quantity=$request->quantity;

      $product->price=$request->price;

      $product->discount_price=$request->dprice;
     
      $product->catagory=$request->catagory;

      $image=$request->image;//geting image
      $imagename=time().'.'.$image->getClientOriginalExtension();//give image  aunique name
      $request->image->move('product',$imagename);// store the image in public folder there have a folder product
      $product->image=$imagename;


      $product->save();

      return redirect()->back();

   

    }

    
    public function show_product()
    {
      $productdata=Product::all();// we will get all the data from product tavle
      return view('admin.show_product',compact('productdata'));
    }
    public function delete_product($id)
    {
      $deleteproduct=product::find($id);

      $deleteproduct->delete();
      return redirect()->back()->with('delete_message',' deleted sucessfully');
     

    }

    public function update_product($id)
    {
      $catagory=catagory::all();
      $updateproduct=product::find($id);

    return view('admin.update_product',compact('updateproduct','catagory'));
     

    }
    public function update_Nproduct(Request $request,$id)// request ar moddha update_product.blade. php thake sob data paua jabe
    {
      $NEWproduct=product::find($id);
    
      $NEWproduct->description=$request->description;


      $NEWproduct->catagory=$request->catagory;

      $NEWproduct->quantity=$request->quantity;

      $NEWproduct->price=$request->price;

      $NEWproduct->discount_price=$request->dprice;
     
      $NEWproduct->catagory=$request->catagory;

      $image=$request->image;//geting image

      if($image)
      {
      $imagename=time().'.'.$image->getClientOriginalExtension();//give image  aunique name
      $request->image->move('product',$imagename);// store the image in public folder there have a folder product
      $NEWproduct->image=$imagename;
      }
      
      $NEWproduct->save();

      return redirect()->back()->with('umessage','updated succesfully updated');
    }

    public function order()
    {
      $order=order::all();
      
      return view('admin.order',compact('order'));
    }

    public function deliverd($id)
    {
      $order=order::find($id);
      $order->delivery_status="deliverd";
      $order->payment_status="Paid";

      $order->save();

      return redirect()->back();
      
      
    }

    public function print_pdf($id)
  
    {
         $order=order::find($id);
         $pdf=PDF::loadView('admin.pdf',compact('order'));
         return $pdf->download('order_details.pdf');
    
      
      
    }

    
    public function send_email($id)
  
    {
      $order=order::find($id);
        return view('admin.email',compact('order'));
           
    }

     
    public function send_user_email(Request $request,$id)
  
    {
      $order=order::find($id);

      //details lekha holo karon details ar moddha ja greeting and 1st line ai gulo ache,,  sent email ar form fillup kore 
      // kore jakhon data gulo pathano hobe takhon data gulo ai khane thake sentNotification.php oi khane jabe
        
      $details= [

        'greeting'=> $request->greeting,
        'firstline'=> $request->firstline,
        'body'=> $request->body,
        'button'=> $request->button,
        'url'=> $request->url,
        'lastline'=> $request->lastline,  

      ];

      Notification::send($order,new SendEmailNotification($details));

      return redirect()->back();


           
    }



    public function searchdata(Request $request)
    {
      $searchText=$request->search ;

      $order=order::where('name', 'LIKE',"%$searchText%")->get();
      return view('admin.order',compact('order'));
    }


}
