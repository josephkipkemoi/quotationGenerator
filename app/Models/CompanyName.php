<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CompanyName extends Model
{
    use HasFactory;

    protected $fillable = ['company_name','relate_company_id'];

    static function validate($request)
    {
        $request->validate([
            'company_name' => 'required','relate_company_id' => 'required'
        ]);

        $company_name = CompanyName::create([
            'relate_company_id' => $request->relate_company_id,
            'company_name' => $request->company_name
        ]);

        return $company_name;
    }

    public function relate_company()
    {
        return $this->belongsTo(CompanyName::class, 'id','relate_company_id');
    }
}
