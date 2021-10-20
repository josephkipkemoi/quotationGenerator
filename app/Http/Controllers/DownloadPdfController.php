<?php

namespace App\Http\Controllers;

use App\Models\DownloadPdf;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class DownloadPdfController extends Controller
{
    //
    public function index(PDF $pdf,DownloadPdf $download, QuotationController $quotation, QuotationTotalController $quotation_total, CompanyController $company, ProductTotalController $product)
    {
      return $download->preparePdf($pdf,$quotation->index(),$company->index(),$quotation_total->index(), $product->index()['products']);
    }
}
