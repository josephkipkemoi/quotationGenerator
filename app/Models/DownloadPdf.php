<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadPdf extends Model
{
    use HasFactory;

    static function preparePdf($request,$pdf,$quotation_address, $company_details, $quotation_total, $products)
    {

         $quotation_address = $quotation_address->where('quotation_id',$request->input('id'))->latest()->first()->makeHidden('created_at')->toArray();
        $company_details = $company_details->where('company_id',$request->input('id'));
        $quotation_total = $quotation_total->where('quotation_totals_id',$request->input('id'));
      
 
        $products_arr = [];
        $quotation_arr = [];
        $company_arr = [];

         foreach($products as $prod)
        {
             array_push($products_arr,$prod->makeHidden('created_at','product_id')->toArray());
        }
 

        foreach($quotation_total as $quotation)
        {
            array_push($quotation_arr, $quotation->makeHidden('created_at','quotation_totals_id','id')->toArray());
        }

        foreach($company_details as $company)
        {
            array_push($company_arr, $company->makeHidden('created_at','quotation_totals_id','id')->toArray());
        }

 
        $pdfFile = $pdf->loadView('download', [ 'quotation_total' => $quotation_arr[0],
                                                'quotation_address' => $quotation_address,
                                                'company_details' => $company_arr[0],
                                                'products' => $products_arr]);

        return $pdfFile->download(`Quotation.pdf`);

    }
 
}
