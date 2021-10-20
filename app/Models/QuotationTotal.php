<?php

namespace App\Models;

use App\Http\Controllers\CompanyController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuotationTotal extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_sub_total','quotation_vat','quotation_total','quotation_id'
    ];

    protected $casts = [
        'quotation_sub_total' => 'integer','quotation_vat' => 'integer',
        'quotation_total' => 'integer','quotation_id'=>'integer'
    ];


    protected $hidden = [
        'created_at','updated_at'
    ];
    
    static function quotationArithmetic($amount,$company)
    {
        $amount = $amount['total_sum'];
        $company_id = $company->company_id;
        $set_vat = 0.16;
        $vat_amount = $amount * $set_vat;
        $sub_total = $amount - $vat_amount;
        

          return [
                'quotation_id' => $company_id,
                'quotation_vat' => $vat_amount, 
                'quotation_sub_total' => $sub_total,
                'quotation_total' => $amount
            ];
    }
}
