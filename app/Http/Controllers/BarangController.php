<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::with('user')->get();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get all barang",
            'data' => $barang
        ]);
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
        $barang = Barang::create([
            'namaBarang' => $request->namaBarang,
            'jumlahBarang' => $request->jumlahBarang,
            'user_id' => $request->user_id
        ]);
    
        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success create barang",
            'data' => $barang
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        $barang = Barang::with('user')->find($barang->id);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success get barang",
            'data' => $barang
        ]);
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
    public function update(Request $request, Barang $barang)
    {
        $barang->update([
            'namaBarang' => $request->namaBarang,
            'jumlahBarang' => $request->jumlahBarang,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success update barang",
            'data' => $barang
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => "Success delete barang",
            'data' => $barang
        ]);
    }
}
