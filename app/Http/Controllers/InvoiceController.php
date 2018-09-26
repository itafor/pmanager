<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use App\Sale;
use App\Costomer;
use App\Product;
class InvoiceController extends Controller
{

   
    public function index(){
        $product_lists = Product::pluck('productname','id');
        return view('invoices.info',compact('product_lists'));
    }

    public function insert(Request $request){
        $customer = new Costomer();
        $customer->firstname = $request->fn;
        $customer->lastname = $request->ln;
        $customer->sex = $request->sex;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->location = $request->location;
        $id = $customer->save();
        if($id != 0){
            foreach ($request->productname as $key => $v) {
                $data =array('cus_id'=>$id,
                               'pro_id'=>$v,
                               'qty'=>$request->qty[$key],
                               'price'=>$request->price[$key],
                               'dis'=>$request->dis[$key],
                               'amount'=>$request->amount[$key]);
                               Sale::insert($data);
            }
        }
        return redirect()->back();
    }

    public function edit(){
        $product_lists = Product::lists('productname','id');
        return view('invoices.update',compact('product_lists'));
    }

    public function update(){

    }
}
