<?php

namespace App\Http\Controllers;

use App\Models\QuotationTotal;
 use Illuminate\Http\Request;
 
class QuotationTotalController extends Controller
{
    //
    public function index(Request $request)
    { 
        return QuotationTotal::where('quotation_totals_id',$request->input('id'))->latest()->get();
    }

    public function store(Request $request,ProductTotalController $product, QuotationTotal $quotation,CompanyController $company)
    {    
        // 
       return QuotationTotal::updateOrCreate($quotation->quotationArithmetic($product->index($request),$company->index($request)),['quotation_totals_id' => $request->input('id')]);
    }
}
