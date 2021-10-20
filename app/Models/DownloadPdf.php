<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadPdf extends Model
{
    use HasFactory;

    static function preparePdf($pdf,$quotation_address, $company_details, $quotation_total, $products)
    {

        $quotation_address = $quotation_address->latest()->first()->makeHidden('created_at')->toArray();
        $company_details = $company_details->latest()->first()->makeHidden('created_at','id','company_id','company_logo_url')->toArray();
        $quotation_total = $quotation_total->latest()->first()->makeHidden('created_at','id','quotation_id')->toArray();
      
        $products_arr = [];

        foreach($products as $prod)
        {
             array_push($products_arr,$prod->makeHidden('created_at','product_id')->toArray());
        }
 
        $pdfFile = $pdf->loadView('download', [ 'quotation_total' => $quotation_total,
                                                'quotation_address' => $quotation_address,
                                                'company_details' => $company_details,
                                                'products' => $products_arr]);

        return $pdfFile->download(`Quotation.pdf`);

    }
}
