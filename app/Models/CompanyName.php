<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CompanyName extends Model
{
    use HasFactory;

    protected $fillable = ['company_name','user_id'];

    protected $hidden = ['created_at','updated_at','user_id','id'];

    static function validate($request)
    {
        $request->validate([
            'company_name' => 'required','user_id' => 'required'
        ]);

        $company_name = CompanyName::create([
            'user_id' => $request->user_id,
            'company_name' => $request->company_name
        ]);

        return $company_name;
    }

    public function company_details()
    {
        return $this->belongsTo(CompanyAdress::class, 'id','id');
    }

    public function company_address()
    {
        return  $this->hasMany(Quotation::class,'quotation_id','id');
    }
}
