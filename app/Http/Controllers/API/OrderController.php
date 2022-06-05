<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     const ORDER_NEW = 1;
    const ORDER_PROCESSING = 2;
    const ORDER_COMPLETED = 3;
    const ORDER_CANCEL = 3;


    public function index(Request $request)
    {
        $user_id = auth()->guard('api')->user()->id;
        try {
            $order = DB::select(DB::raw("SELECT o.id,o.full_name,o.phone,p.name,o.address,o.quantity,o.status,o.created_at
            FROM reactjs_test.orders as o
            LEFT JOIN products as p ON o.product_id = p.id
            LEFT JOIN users as u ON o.user_id = u.id where u.id = $user_id  order by o.created_at DESC limit 10 "));
            return $this->sendResponse($order, 'Order retrieved successfully.');
        }catch (Exception $e){
            return $this->sendError( $e->getMessage(),'Product created error.');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'item' => 'required',
            'user_id' => 'required',
            'full_name' => 'required',
            'phone' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        try {
            $item = $data['item'];
            $result = [];
            foreach ($item as $key=>$value)
            {
                $item_order = [
                    'user_id'=> $data['user_id'],
                    'full_name'=> $data['full_name'],
                    'phone'=> $data['phone'],
                    'status'=>self::ORDER_NEW,
                    'address'=> $data['address'],
                    'product_id'=>$value['product_id'],
                    'quantity'=> $value['quantity'],
                    'price'=> $value['price']
                ];
                $order = Order::create($item_order);
                $result[] = $order;
            }
            return $this->sendResponse( $result,'Product created successfully.');
        }  catch (Exception $e){
            return $this->sendError( $e->getMessage(),'Product created error.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
