<?php

namespace App\Http\Controllers;

use App\Models\CompanyName;
use App\Models\Quotation;
use Illuminate\Http\Request;

class QuotationAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, CompanyName $companyName)
    {
        //
          return $companyName->findOrFail($request->company_id)->company_address;
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Quotation $quote)
    {
        return $quote->validate($request);
     }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id, CompanyName $company_name)
    {
        // one company can have many quotation addresses
        // Get single quoation from company
        return $company_name->findOrFail($request->company_id)->company_address->where('id','=',$id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        return Quotation::findOrFail($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Quotation::findOrFail($id)->delete();
    }
}
