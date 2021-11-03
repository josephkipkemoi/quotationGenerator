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
    public function index(Request $request, CompanyName $company_name, Product $product, User $user)
    {
        $companyName = $user->findOrFail($request->user_id)->company_name->where('id',$request->c_name_id);
        $companyAddress =  $company_name->findOrFail($request->user_id)->company_details->where('id', $request->c_name_id)->get();
        $quotationAddress = $company_name->findOrFail($request->user_id)->company_address->where('id',$request->q_address);
        $products = $product->findOrFail($request->prod_id)->user_quotation;
        $quotationTotal =  $product->findOrFail($request->prod_id)->get_quotation;

        return ['company_name' => $companyName,
                'company_address' => $companyAddress,
                'quotation_address' => $quotationAddress,
                'products' => $products,
                'quotation_total' => $quotationTotal
            ];

    //    return $download->preparePdf($request,$pdf,
    //                                 $quotationAddress,
    //                                 $companyName,
    //                                 $companyAddress,
    //                                 $quotationTotal,
    //                                 $products
    //                             );
    }
}
