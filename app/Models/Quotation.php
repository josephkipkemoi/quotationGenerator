<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    use HasFactory;

    protected $fillable = [
        'quotation_id', 'quotation_to', 'quotation_date',
         'quotation_number'
    ];

    protected $hidden = [
        'created_at','updated_at','id'
    ];

    protected $visible = [
        'quotation_to','quotation_date','quotation_number'
    ];

    static function validate($request)
    {
         $request->validate(['quotation_id' => 'required', 'quotation_to' => 'required',
                            'quotation_date' => 'required', 'quotation_number' => 'required']);

        $quotation_address = Quotation::create($request->all());

        return $quotation_address;
    }

    public function quotation_address()
    {
        return $this->hasMany(CompanyName::class,'id','id');
    }

    public function product_details()
    {
        return $this->hasMany(Product::class, 'product_id', 'product_id');
    }
}
