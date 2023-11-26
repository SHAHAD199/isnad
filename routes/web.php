<?php

use App\Models\Block;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('vv', function(){
//     $blocks = Block::whereNotNull('customer_name')->get(['id',
//     'customer_name', 'customer_phone', 'booking_date', 'date_of_sale', 'img', 'note', 'updated_by', 'updated_at']);
 

//     $customers = Customer::get();
//     foreach($blocks as $key=>$block)
//     { 
       

//         foreach($customers as $customer){   
//             if($customer->phone == $block->customer_phone && $customer->name == $block->customer_name):
//                 DB::table('block_customer')->insert(
//                     [
//                         'block_id'     => $block->id,
//                         'customer_id'  => $customer->id,
//                         'booking_date' => $block->booking_date,
//                         'sale_date'    => $block->date_of_sale,
//                         'img'          => $block->img,
//                         'updated_by'   => $block->updated_by,
//                         'note'         => $block->note,
//                         'updated_at'   => $block->updated_at,
//                     ]
//                     );
//             endif;        
//     }     
//     }
// });


