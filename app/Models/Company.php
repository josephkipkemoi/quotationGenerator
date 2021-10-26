<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_logo_url', 'company_slogan', 'company_address',
         'company_web_url','company_email','company_id'
    ];

    protected $hidden = [
        'created_at','updated_at'
    ];

    static function validate($request)
    {

        $request->validate(['company_logo_url' => 'required', 'company_slogan' => 'required',
                            'company_web_url' => 'required', 'company_email' => 'required','company_id' => 'required']);
  
        $company_details = Company::create($request->all());
        
        return $company_details;
    }

    public function company_details()
    {
        return $this->belongsTo(Company::class,'company_id','id');
    }
    
}
