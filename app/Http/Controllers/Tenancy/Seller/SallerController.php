<?php

namespace App\Http\Controllers\Tenancy\Seller;

use App\Http\Controllers\Controller;
use App\Models\Tenancy\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SallerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function create()
    {
        //


        $projects = DB::table('invoices')
        ->leftJoin('mostafids', 'Invoices.Cus_NO', '=', 'mostafids.acountAny')->get(['invoices.id','invoices.datee','invoices.Total', 'invoices.Vat','invoices.Trns', 'mostafids.Name']);

    
        

    //     $books_borrowed = Invoice::join('mostafids', 'Invoices.Cus_NO', '=', 'mostafids.id')->get();
    //     // $data =Invoice::all();
    //    dd(   $books_borrowed->all());
        return view('Tenancy.Saller.Saller' ,['data' =>  $projects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
