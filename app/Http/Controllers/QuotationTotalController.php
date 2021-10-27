<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\QuotationTotal;
 use Illuminate\Http\Request;
 
class QuotationTotalController extends Controller
{
    //
    public function index(Request $request)
    { 
        return QuotationTotal::find($request->quotation_total_id)->quotation_total()->get()->first();
    }

    public function store(Request $request,Product $product, QuotationTotal $quotation)
    {    
        // 
       return QuotationTotal::create($quotation->quotationArithmetic($product->find($request->product_id)->quotation_total()->sum('product_total'),
                                        $product->find($request->product_id)->quotation_total()->get()->first()->product_id));
    }
}
