<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PivotOrderProducts;
use App\Models\SellerProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class OrderController extends Controller
{
    //
    protected function OrderValidator(array $data)
    {
        return Validator::make($data, [
            'seller_product_id' => ['required'],
            'quantity' => ['required'],
            // 'total_price' => ['required', 'numeric'],
            // 'price' => ['required', 'numeric'],
        ]);
    }
    public function index()
    {
        if(auth('buyer_api')->user() && auth('buyer_api')->user()->role == "buyer")
        {
            $order = Order::where('buyer_id', auth('buyer_api')->user()->buyer->id);
            return $order;
        }
        else
        {
            return response()->json(['message'=>'UnAuthorized'],401);
        }
    }
    public function store(Request $request)
    {
        if(auth('buyer_api')->user() && auth('buyer_api')->user()->role == "buyer")
        {
            $valid = $this->OrderValidator($request->all());
            if (!$valid->fails())
            {
                try
                {
                    DB::beginTransaction();
                    $totalPrice = 0;
                    $prefix = "ORDER-";
                    $OrdNum = IdGenerator::generate(['table' => 'orders','field' => 'order_num', 'length' => 10, 'prefix' =>$prefix]);
                    foreach($request->seller_product_id as $key => $row)
                    {
                        $product = SellerProduct::find($row);
                        $totalPrice = $totalPrice + $product->price;
                        $totalPrice = $totalPrice * $request->quantity[$key];
                    }
                    $order = new Order();
                    $order->order_num = $OrdNum;
                    $order->buyer_id = auth('buyer_api')->user()->buyer->id;
                    $order->total_price = $totalPrice;
                    $order->save();
                    foreach($request->seller_product_id as $key => $row)
                    {
                        $orderProduct = new PivotOrderProducts();
                        $orderProduct->order_id = $order->id;
                        $orderProduct->seller_product_id = $row;
                        $orderProduct->quantity = $request->quantity[$key];
                        $orderProduct->save();
                    }
                    DB::commit();
                    return response()->json([
                        'status' => true,
                        'message' => 'Youre Order Has been Placed...',
                        'Order_id'=> $OrdNum
                    ], 200);
                }
                catch (Exception $ex)
                {
                    return response()->json(['error', $ex->getMessage()],500);
                }
            }
            else
            {
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $valid->errors()
                ], 403);
            }
        }
        else
        {
            return response()->json([
                'status' => false,
                'message' => 'UnAuthorize',
            ], 401);
        }
    }
}
