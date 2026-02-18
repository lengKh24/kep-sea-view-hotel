<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Taxmgt;
use Illuminate\Support\Facades\DB;

class TaxMgtApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validation
        $validated = $request->validate([
            'sale_mgt_id' => 'required|exists:sale_m_g_t_s,id',
            'tax_invoice_number' => 'required|unique:taxmgts',
            'tax_hidden_price' => 'nullable|numeric',
        ]);

        try {
            return DB::transaction(function () use ($request) {
                // 2. Calculation Logic
                $hiddenPrice = $request->tax_hidden_price ?? 0;
                
                // We assume you fetch the original subtotal from the SaleMgt model
                $originalSale = \App\Models\SaleMgt::findOrFail($request->sale_mgt_id);
                
                $newSubTotal = $originalSale->balance_subtotal + $hiddenPrice;
                $vatPrice = $newSubTotal * 0.10; // 10% VAT
                $finalTotal = $newSubTotal + $vatPrice;

                // 3. Create the Record
                $tax = TaxMgt::create([
                    'sale_mgt_id' => $request->sale_mgt_id,
                    'tax_invoice_number' => $request->tax_invoice_number,
                    'tax_hidden_price' => $hiddenPrice,
                    'tax_sub_total' => $newSubTotal,
                    'tax_vat_price' => $vatPrice,
                    'tax_balance_final' => $finalTotal,
                    'status' => 'pending'
                ]);

                return response()->json(['success' => true, 'data' => $tax]);
            });
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
