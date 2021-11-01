<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyName;
use App\Models\DownloadPdf;
use App\Models\Product;
use App\Models\Quotation;
use App\Models\QuotationTotal;
use App\Models\User;

use Illuminate\Http\Request;

use Barryvdh\DomPDF\PDF;

class DownloadPdfController extends Controller
{
    //
    public function index(Request $request, PDF $pdf,DownloadPdf $download, Quotation $quotation, QuotationTotal $quotation_total, CompanyName $company_name, Product $product, Company $company,User $user)
    {
       return $download->preparePdf($request,$pdf,
                                    $quotation->find($request->product_id)->quotation_address()->latest()->first()->attributesToArray(),
                                    $user->find($request->product_id)->company_name->last()->makeHidden('id')->toArray(),
                                    $company->find($request->product_id)->company_details->latest()->first()->makeHidden('company_id','id')->toArray(),
                                    $quotation_total->find($request->product_id)->quotation_total_method->makeHidden('id')->attributesToArray(),
                                    $product->find($request->product_id)->user_quotation()->get()->makeHidden(['product_id','id'])->toArray()
                  );
    }
}
