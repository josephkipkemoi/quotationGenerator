<?php

namespace App\Http\Controllers;

use App\Models\QuotationTotal;

class QuotationTotalController extends Controller
{
    //
    public function index()
    { 
        return QuotationTotal::findOrFail(1);
    }

    public function store(ProductTotalController $product, QuotationTotal $quotation,CompanyController $company)
    {    
       return QuotationTotal::create($quotation->quotationArithmetic($product->index(),$company->index()));
    }
}
