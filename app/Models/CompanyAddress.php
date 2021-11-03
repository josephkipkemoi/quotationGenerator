<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_logo_url', 'company_slogan', 'company_address',
        'company_web_url','company_email'
    ];

    protected $hidden = [
        'created_at','updated_at','id'
    ];

    static function validate($request)
    {
        $request->validate(['company_logo_url' => 'required', 'company_slogan' => 'required',
                            'company_web_url' => 'required', 'company_email' => 'required']);

        $company_details = CompanyAddress::create($request->all());

        return $company_details;
    }

    public function company_details()
    {
        return $this->belongsTo(CompanyName::class,'id','id');
    }

}
