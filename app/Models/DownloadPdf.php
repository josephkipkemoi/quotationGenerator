<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadPdf extends Model
{
    use HasFactory;

    static function preparePdf($request,$pdf,$quotation_address, $company_details, $quotation_total, $products,$products_arr)
    {

         $pdfFile = $pdf->loadView('download', [ 'quotation_total' => $products,
                                                'quotation_address' => $quotation_address,
                                                'company_details' => $quotation_total,
                                                'company_name' => $company_details,
                                                'products' => $products_arr]);

        return $pdfFile->download(`Quotation.pdf`);
    }

}
