<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\orders;



class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('orders')
            ->join('clients', 'orders.id_client', '=', 'clients.id_client')
            ->join('employees', 'orders.id_employee', '=', 'employees.id_employee')
            ->orderBy('orders.id')
        ->get();

        return view('home')->with(['data'=>$data]);
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
        $this->validate($request,[
            'device' => 'required|string',
            'manufacturer' => 'required|string',
            'model' => 'required|string',
            'fault' => 'required|string',
            'note' => 'required|string',

            'id_client' => 'required|int',
            'id_employee' => 'required|int',

            'price' => 'required|int'
            ]);
        $orders= new orders();
            $orders->device =$request->device;
             $orders->manufacturer = $request->manufacturer;
             $orders->model = $request->model;
             $orders->fault = $request->fault;
             $orders->note = $request->note;

             $orders->id_client = $request->id_client;
             $orders->id_employee = $request->id_employee;

             $orders->price = $request->price;
             $orders->author_id = 1;
             $orders -> save();



        return response()->json(['success' => 'Новость добавлена']);














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
