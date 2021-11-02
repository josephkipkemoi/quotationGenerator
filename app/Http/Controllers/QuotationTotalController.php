<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\QuotationTotal;
 use Illuminate\Http\Request;

class QuotationTotalController extends Controller
{
    //
    public function index(Request $request, Product $product)
    {
        return $product->find($request->product_id)->get_quotation;
    }

    public function store(Request $request,Product $product, QuotationTotal $quotation)
    {
        //
        return QuotationTotal::create($quotation->quotationArithmetic($product->find($request->product_id)->user_quotation->sum('product_total'),
                                        $product->find($request->product_id)->quotation_total->product_id));
    }
}
