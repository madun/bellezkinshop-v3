<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\HistoryTransaction;
// use App\DetailTransaksi;

class HistoryOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $customerId =  HistoryTransaction::where('customer_id',1)->get();

        // $transactions = DB::table('cn_transaksi')
        //     ->join('cn_order_history', 'cn_order_history.transaksi_id', '=' ,'cn_transaksi.id')
        //     ->select('cn_transaksi.tgl_transaksi', 'cn_transaksi.nomor_transaksi', 'cn_transaksi.grand_total', 'cn_order_history.transaksi_id')
        //     ->where('customer_id',1)->get();

        // $transactions = HistoryTransaction::find([1]);

        $transactions = array();
        return view('history-transaction', compact('transactions'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
    public function show($id)
    {
      
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

    public function orderlist()
    {
        $transactions = DB::table('cn_transaksi')
        ->join('cn_order_history', 'cn_order_history.transaksi_id', '=' ,'cn_transaksi.id')
        ->select('cn_transaksi.tgl_transaksi', 'cn_transaksi.nomor_transaksi', 'cn_transaksi.grand_total', 'cn_transaksi.status_transaksi', 'cn_order_history.transaksi_id')
        ->where('customer_id',1)->get();

        return view('orderlist', compact('transactions'));
    }

    public function detailhistory()
    {
        // $transaction = DB::table('cn_transaksi')
        //     ->join('cn_shipping_address', 'cn_shipping_address.customer_id', '=' ,'cn_transaksi.id')
        //     ->select('cn_transaksi.grand_total', 'cn_transaksi.kode_spb', 'cn_shipping_address.alamat')
        //     ->where('customer_id',1)->get();

        // $detailtransaksi = DetailTransaksi::where('transaksi_id',153)->get();

        $detailtransaksi = DB::table('cn_transaksi_detail')
            ->join('cn_barang', 'cn_barang.kode_barang', 'cn_transaksi_detail.id')
            ->select('cn_transaksi_detail.harga', 'cn_transaksi_detail.qty', 'cn_barang.nama')
            ->get();



        return view('detailhistory', compact('detailtransaksi'));
    }
}
