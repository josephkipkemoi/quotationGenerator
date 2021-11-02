<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id'];

    protected $casts = ['invoice_id' => 'integer'];

    protected $primaryKey = 'invoice_id';

    public function invoice()
    {
        return $this->hasManyThrough(CompanyName::class,Company::class);
    }
}
