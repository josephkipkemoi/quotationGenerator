<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyName extends Model
{
    use HasFactory;

    protected $fillable = ['company_name'];

    static function validate($request)
    {
        $request->validate([
            'company_name' => 'required'
        ]);

        $company_name = CompanyName::create([
            'company_name' => $request->company_name
        ]);

        return $company_name;
    }
}
