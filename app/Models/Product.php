<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id','product_quantity','product_description',
        'product_unit_price','product_total'
    ];

    protected $casts = [
        'product_unit_price' => 'integer', 'product_total' => 'integer', 'product_quantity' => 'integer'
    ];

    protected $hidden = [
        'created_at','updated_at','product_id'
    ];

     static function validateProduct($request)
    {
        $request->validate(['product_id' => 'required','product_quantity' => 'required',
                            'product_description' => 'required','product_unit_price' => 'required'
                            ]);

         return $request ;
    }

    static function setTotalPrice($request)
    {
        $productQty = $request['product_quantity'];
        $productUnitPrice = $request['product_unit_price'];
        $prodTotal = $productQty * $productUnitPrice;
        $request['product_total']  = $prodTotal;

        return $request;
    }

    static function updateDetails($request, $product)
    {
        $productQty = $request['product_quantity'];
        $productUnitPrice = $request['product_unit_price'];
        $prodTotal = $productQty * $productUnitPrice;
        $request['product_total']  = $prodTotal;

        return $product->update($request->only(['product_quantity','product_description','product_unit_price','product_total']));
     }

     public function user_quotation()
     {
         return $this->hasMany(Product::class);
     }

    public function quotation_total()
    {
        return $this->belongsTo(Product::class,'id','product_id');
    }

     public function latestQuotation()
    {
        return $this->hasOne(QuotationTotal::class, 'product_id','quotation_totals_id');
    }

    public function get_quotation()
    {
        return $this->belongsTo(QuotationTotal::class,'product_id','quotation_totals_id');
    }
}
