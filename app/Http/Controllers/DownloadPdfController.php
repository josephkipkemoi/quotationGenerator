<?php

namespace App\Http\Controllers;

use App\Models\DownloadPdf;
 
use App\Models\User;

use Illuminate\Http\Request;
 
use Barryvdh\DomPDF\PDF;

class DownloadPdfController extends Controller
{
    //
    public function index(Request $request, PDF $pdf,DownloadPdf $download, QuotationController $quotation, QuotationTotalController $quotation_total, CompanyController $company, ProductTotalController $product)
    {
      return $download->preparePdf($request,$pdf,$quotation->index(),$company->index($request),$quotation_total->index($request), $product->index($request)['products']);
    }

    
}
