<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Adapter\PDFLib;
use Exception;
use GuzzleHttp\Psr7\Response;
use PhpParser\Node\Stmt\TryCatch;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = category::all();
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request)
    {
        $data = new category;
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    public function delete_category($id)
    {
        $data = category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category delete successfully');
    }
    public function view_product()
    {
        $categories = Category::all();
        return view('admin.product', compact('categories'));
    }
    public function add_product(Request $request, Response $response)
    {

        $product = new Product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount;
        $product->quantity=$request->quantity;
        $product->category=$request->category;
        $image =$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;

        $product ->save();

        return redirect("/view_product")->with('message', 'Product added successfully!');
    }
    public function show_product()
    {
        $product = Product::all();
        return view('admin.show_product', compact('product'));
    }
    public function delete_product($id){
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product delete succesfully');
    }

    public function update_product($id){
        $product = product::find($id);
        $category = Category::all();
        return view('admin.update_product',compact('product','category'));
    }
    public function update_product_comfirm(Request$request, $id){
        $product=Product::find($id);
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount;
        $product->quantity=$request->quantity;
        $product->category=$request->category;

        $image=$request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }
      
        $product->save();
        return redirect('/show_product')->with('message','Update successfully');
    }
    public function order()
    {
        $order=order::all();

        return view('admin.order',compact('order'));
    }

    public function delivered($id)
    {
        $order =order::find($id);

        $order->delivery_status="delivered";
        $order->payment_status="Paid";
        $order->save();
        return redirect()->back();
    }

    public function print_pdf($id)
    {
        $order= order::find($id);
        $pdf= PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }

    public function send_email($id)
    {
        $order = order::find($id);

        return view('admin.email_info',compact('order'));
    }

    public function send_user_email(Request $request,$id)
    {
        $order =order::find($id);

        $details= [
            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,



        ];

        Notification::send($order,new SendEmailNotification($details));
        return redirect()->back();
    }

    public function searchdata(Request $request)
    {
        $searchText = $request->search;
        $order= order::where('name','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->get();
        return view('admin.order', compact('order')); 
    }


}
