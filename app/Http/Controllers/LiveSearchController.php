<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Http\Request;
use DB;
class LiveSearchController extends Controller
{
    function index(){
        $students = DB::table('students')->get();
        return view('dynamicsearch', compact('students'));
    }

  public  function action(Request $request){
        if($request->ajax())
        {
$query = $request->get('query');
if($query !=''){
    $data=DB::table('customers')
    ->where('name','like','%'.$query.'%')
    ->orwhere('address','like','%'.$query.'%')
    ->orwhere('city','like','%'.$query.'%')
    ->orwhere('postalCode','like','%'.$query.'%')
    ->orwhere('country','like','%'.$query.'%')
    ->orderBy('id','DESC')
    ->get();
}else{
    $data=DB::table('customers')
    ->orderBy('id','desc')
    ->get();   
    }
    $data_row = $data->count();
    if($data_row > 0){
        foreach($data as $row){
            $output .= '<tr>
            <td>'.$row->name.'</td>
            <td>'.$row->address.'</td>
            <td>'.$row->city.'</td>
            <td>'.$row->postalCode.'</td>
            <td>'.$row->country.'</td>
            </tr>';
        }
    }else{
      $output = '<tr>
      <td align="center" colspan="5">
      No data found
      </td>
      </tr> '; 
            }
    $data = array(
        'data_table' => $output,
        'total_data' => $total_data
    );
            echo json_encode($data);
        }
    }

    
}
