<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PDF;
use App;
class DynamicPDFController extends Controller
{
    function index()
{
    $customer_data=$this->get_customer_data();
    
return view('dynamic_pdf')->with('customer_data', $customer_data);
}
function get_customer_data()
{
    $customer_data = DB::table('customers')->get();
    return $customer_data;
}

function pdf(){
    $pdf = App::make('dompdf.wrapper');
$pdf->loadHTML($this->conver_customer_data_to_html());
return $pdf->stream();
}
function conver_customer_data_to_html(){
    $customer_data = $this->get_customer_data();
    $output ='<h3 align="center">Customer Data</h3>
    <table width="100%" style="border-collapse:collapse; border:3px solid ; " >
    <thead style="border-collapse:collapse; border:3px solid ; ">
    <tr>
    <th style="border: 3px; solid black; padding:12px;" width="20%">Name</th>
    <th style="border:3px; solid  black; padding:12px;" width="30%">Address</th>
    <th style="border:3px; solid black; padding:12px;" width="15%">City</th>
    <th style="border:3px; solid black; padding:12px;" width="15%">Postal Code</th>
    <th style="border:3px; solid black; padding:12px;" width="20%">Country</th>
    </tr>
    <thead>';
    foreach($customer_data as $customer){
        $output .='
        
        <tr style="border:3px; solid black;border-collapse:collapse;">
        <td style="border:3px; solid black; padding:12px;" >'.$customer->name.'</td>
        <td style="border:3px; solid black; padding:12px;" >'.$customer->address.'</td>
        <td style="border:3px; solid black; padding:12px;" >'.$customer->city.'</td>
        <td style="border:3px; solid black; padding:12px;" >'.$customer->postalCode.'</td>
        <td style="border:3px; solid black; padding:12px;" >'.$customer->country.'</td>
        </tr>';       
    }
    $output .='</table>';
    return $output;
    
}
}
