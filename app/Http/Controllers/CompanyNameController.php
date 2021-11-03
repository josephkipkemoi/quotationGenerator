<?php

namespace App\Http\Controllers;

use App\Models\CompanyName;
use App\Models\User;
use Illuminate\Http\Request;


class CompanyNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, User $user)
    {
       return ['company_names' => $user->findOrFail($request->user_id)->company_name];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CompanyName $company)
    {
        //
       return $company->validate($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id, User $user)
    {
        //
        return ['company_name' => $user->findOrFail($request->user_id)->company_name[$id-1]];
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
        // Find company name by ID and update
       return CompanyName::findOrFail($id)->update(['company_name' => $request->company_name]);
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
        return CompanyName::findOrFail($id)->delete();
    }
}
