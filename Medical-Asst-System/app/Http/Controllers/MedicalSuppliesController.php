<?php

namespace App\Http\Controllers;


use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;
use App\Models\medical_supplies_medical;
use App\Models\medical_supplies_technical;
use App\Models\medical_supplies_order;
use App\Models\cart;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailNotify;
use Illuminate\contract\Mailer;
use Illuminate\Support\Facades\Input;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;

class MedicalSuppliesController extends Controller
{
    //
    public function index(Request $request)
   { 
        if (!session()->has('user_name')) {
               // Set alert message and type
                $alertMessage = 'Please login to access this page.';
                $alertType = 'warning';

                // Redirect to login page with alert message
                return redirect()->route('user_login')->with(compact('alertMessage', 'alertType'));
        } else {
               //Enter your previous view code
     
    $medical_supplies_medicals = medical_supplies_medical::where('category', 'medical')->get();
    $totalcount=cart::count();
    if ($request->ajax()) {
      $productName = $request->input('product_name');
      $banks = DB::table('medical_supplies_table')
          ->where('product_name', $productName)
          ->get();

        //    $banks = $query->where('id', $req->search)->get();
        Session::put('bloodB_search_result', $banks);
        $data = $request->data;
        $products=$medical_supplies_medicals->where('product_name',$request->data);
        return response()->json(['data'=>$products]);
        
    } else {
      $medical_supplies_medicals = medical_supplies_medical::where('category', 'medical')
      ->where('quantity', '>', 0)
      ->get();
      $totalcount=cart::count();
       
        return view('medical_supplies.index',['medical_supplies_medicals'=>$medical_supplies_medicals],compact('totalcount')); 
    }

  }
    }

   
   public function searchm(Request $request)
   { 
    
    $searchQuery = $request->query('search');
    $medical_supplies_technicals = medical_supplies_medical::where('product_name', 'like', '%' . $searchQuery . '%')
    ->where('quantity', '>', 0)
    ->get();
    $totalcount=cart::count();
    return view('medical_supplies.indexb',['medical_supplies_technicals'=>$medical_supplies_technicals],compact('totalcount')); 
   }
  
   public function searcht(Request $request)
   { 
    $searchQuery = $request->query('search');
    $medical_supplies_medicals = medical_supplies_medical::where('product_name', 'like', '%' . $searchQuery . '%')
    ->where('quantity', '>', 0)
    ->get();
    $totalcount=cart::count();
    return view('medical_supplies.index',['medical_supplies_medicals'=>$medical_supplies_medicals],compact('totalcount')); 
   }

   public function indexb(Request $request)
   {
    $medical_supplies_technicals = medical_supplies_medical::where('category', 'technical')
    ->where('quantity', '>', 0)
    ->get();
    $totalcount=cart::count();
    if($request->ajax())
    {
    $searchData = $request->input('search_data');

    // Perform any operations with the search data

    // Return a response, for example, you could return the search data
    return response()->json(['search_data' => $searchData]);
    }
    return view('medical_supplies.indexb',['medical_supplies_technicals'=>$medical_supplies_technicals],compact('totalcount'));
   // return view('medical_supplies.index');
   }


   public function orderview(Request $request)
   {
    $orders=medical_supplies_order::all();
 
    return view('medical_supplies.order_view',['orders'=>$orders]);
  
   }
   public function edit(medical_supplies_medical $medical_supplies_medical)
   {
     
     return view('medical_supplies.detail',['medical_supplies_medical'=>$medical_supplies_medical]);
   }
   public function editb(medical_supplies_medical $medical_supplies_medical)
   {
     
    return view('medical_supplies.detail',['medical_supplies_technical'=>$medical_supplies_medical]);
   }
   public function store(Request $request)
   {
    $data=$request->validate([
        'product_name'=>'required|unique:carts,product_name',
        'product_quantity'=>'required|numeric',
        'product_rate'=>'required|decimal:0,2',
        'product_image'=>'required',
        'user_id'=>'required'
      ]); 
 
               $newProduct=cart::create($data);
           
  
    return redirect(route("medical_supplies.index"));   
 }
 public function storeb(Request $request)
 {
  $data=$request->validate([
      'product_name'=>'required|unique:carts,product_name',
      'product_quantity'=>'required|numeric',
      'product_rate'=>'required|decimal:0,2',
      'product_image'=>'required',
      'user_id'=>'required'
    ]); 

  $newProduct=cart::create($data);
  return redirect(route("medical_supplies.indexb"));   
}
public function cart()
{
/* $carts=cart::all();
 $medical_supplies_technicals=medical_supplies_technical::all();
return view('medical_supplies.cart',['carts'=>$carts]);
*/

$joinedData = DB::table('carts')
    ->join('medical_supplies_medicals', 'carts.product_name', '=', 'medical_supplies_medicals.product_name')
    ->select('medical_supplies_medicals.quantity')
    ->get();
   
    $carts = Cart::join('medical_supplies_medicals', 'carts.product_name', '=', 'medical_supplies_medicals.product_name')
    ->where('medical_supplies_medicals.quantity', '>', 0)
    ->get();
  return view('medical_supplies.cart',['carts'=>$carts],['j'=>$joinedData]);
}


public function storeImage(Request $request)
{

  $filename = time()."-ws.".$request->file('image')->getClientOriginalExtension();
  try{
  $request->validate(['image'=>'required|image|mimes:png,jpg,gif,svg,jpeg|max:2048']);
  }catch (exception $e){
    $carts=cart::all();
    return view('medical_supplies.cart',['carts'=>$carts]);
  }
  $request->file('image')->storeAs('uploads',$filename);
  $carts=cart::all();
  return view('medical_supplies.cart',['carts'=>$carts]);
}
public function delete(cart $cart)
    {
      $cart->delete();
      return redirect(route("medical_supplies.cart")); 
    }
    public function orderdelete(medical_supplies_order $order)
    {
      $order->delete();
      return redirect(route("medical_supplies.order_view")); 
    }
   
    public function update(cart $cart,Request $request)
    {
        $data=$request->validate([
            'id'=>'required',
            'product_quantity'=>'required|numeric',
          ]); 

     $cart->update($data);

     return redirect(route("medical_supplies.cart"));  
    }
    public function order()
    {
      $carts=cart::all();
      $productInfo = $carts->map(function ($item) {
        return [
            'product_name' => $item->product_name,
            'product_quantity' => $item->product_quantity
        ];
    })->toArray();
      
      $p=0;
      $s=0;
     
      foreach($carts as $cart)
      {
        $p=$p+($cart->product_rate*$cart->product_quantity);
        $s=$s+($cart->product_quantity);
       
      }
      Cart::join('medical_supplies_medicals', 'carts.product_name', '=', 'medical_supplies_medicals.product_name')
       ->update(['medical_supplies_medicals.quantity' => DB::raw('medical_supplies_medicals.quantity - carts.product_quantity')]);




      echo $p ;

      echo $s;
      $u=1;
      $productInfoString = '';

    foreach ($productInfo as $info)
     {
         $productInfoString .= $info['product_name'] . ' (' . $info['product_quantity'] . '), ';
     }

     // echo  $productNamesString ;
     echo   $productInfoString;
      $t="test";
      $e="royaatraya@gmail.com";
      $data = [
        'product_name' => $productInfoString,
        'product_quantity' => $s,
        'product_rate' => $p,
        'user_id' => $u,
        'user_name' => $t,
        'user_email' => $e,
        'order_id' => $u
    ];
    $newProduct=medical_supplies_order::create($data);
    }
    public function generatePdfb()
    {
        $data=[
           'tittle'=>'test pdf',
           'date'=>date('m/d/Y'),
           
        ];
        $pdf = Pdf::loadView('pdf.invoice', $data);
        //return Pdf::loadFile(public_path().'\myfile.html')->save('\C:\xampp\htdocs\test\public\my_stored_file.pdf')->stream('download.pdf');
        // return $pdf->download('\C:\xampp\htdocs\test\public\invoice.pdf');
         Pdf::loadView('pdf.invoice', $data)->save('C:/xampp/htdocs/test/public/saves/my_stored_file.pdf')->stream('download.pdf');
        $datab=array('name'=>'gazi adib');
        Mail::send(['text'=>'mail'],$datab,function($message)
        {
            $message->to('royaatraya5@gmail.com','user')->subject('laravel email with attachment');
            $message->attach('C:/xampp/htdocs/test/public/saves/my_stored_file.pdf');
            $message->from('emergencymedicalservices23@gmail.com','user');
        });
    }
}
