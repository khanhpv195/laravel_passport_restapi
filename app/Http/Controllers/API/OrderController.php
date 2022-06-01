<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Order;
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
    public function index()
    {
        //
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
        $item = $data['item'];
        $order = [];
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
             $result = Order::create($item_order);
            array_push($order,$result);
        }
        return $this->sendResponse( order,'Product created successfully.');
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
