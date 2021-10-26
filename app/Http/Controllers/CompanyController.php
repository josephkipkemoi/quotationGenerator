<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyDetailsRequest;
use App\Models\Company;
use App\Models\CompanyName;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Company $company)
    {
        //
        // dd($company->find(1)->company_details()->where('id',2)->get()->toArray());
        return  $company->company_details()->find($request->company_detail);     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Company $company)
    {
        return $company->validate($request);
    }


    public function show($id)
    {
        return Company::where('company_id', $id)->get();
    }


}
