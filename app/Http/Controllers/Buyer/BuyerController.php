<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Models\Buyer;
use Illuminate\Http\Request;

class BuyerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $compradores = Buyer::has('transactions')->get(); //Solo aquellos usuarios que posean transacciones
//        return response()->json(['data' => $compradores], 200);
        return $this->showAll($compradores);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
//    public function show($id)
    public function show(Buyer $buyer)
    {
//        $comprador = Buyer::has('transactions')->findOrFail($id);
//        return response()->json(['data' => $comprador], 200);
        return $this->showOne($buyer);
    }


}
