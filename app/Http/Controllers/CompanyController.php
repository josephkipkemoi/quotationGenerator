<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyDetailsRequest;
use App\Models\Company;
use App\Models\CompanyName;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CompanyName $company_name)
    {
        //
        return $company_name->find($request->company_id)->company_details;
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
        return User::find($id)->company_address;
    }


}
