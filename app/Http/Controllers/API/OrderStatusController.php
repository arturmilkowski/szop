<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\OrderStatus as OrderStatusResource;
use App\Models\Order;
use App\Models\Status;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OrderStatusResource::collection(Status::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Status $status)
    {
        return new OrderStatusResource(Status::find($status->id));
        // return new OrderStatusResource($status);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Order $order, Status $status)  // Request $request
    {        
        $order->status_id = $status->id;
        $order->save();
        $updated = false;
        if ($order->wasChanged('status_id')) {
            $updated = true;
        }
        // new OrderStatusResource($status);
        return response()->json(['updated' => $updated, 'status' => $status], 200);
        // return response()->json(['res' => dump($res)], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Status $status)
    {
        // $deleted = $status->delete();
        // return response()->json(['deleted'  => $deleted], 200);
    }
}
