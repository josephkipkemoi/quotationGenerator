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
    public function index(Request $request)
    {
        //
        return Company::findOrFail($request)->first();     
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
