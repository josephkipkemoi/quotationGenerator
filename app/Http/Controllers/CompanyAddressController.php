<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyDetailsRequest;
use App\Models\CompanyAddress;
use App\Models\CompanyName;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CompanyName $company_name)
    {
        //
        return $company_name->find($request->company_id)->company_details->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CompanyAddress $company)
    {
        return $company->validate($request);
    }

    public function show($id, CompanyName $company_name)
    {
        return $company_name->findOrFail($id)->company_details;
    }

    public function destroy($id)
    {
        return CompanyAddress::findOrFail($id)->delete();
    }

    public function update(Request $request,$id)
    {
        return CompanyAddress::findOrFail($id)->update($request->all());
    }
}
