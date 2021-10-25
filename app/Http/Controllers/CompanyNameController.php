<?php

namespace App\Http\Controllers;

use App\Models\CompanyName;
use App\Models\User;
use Illuminate\Http\Request;
use PharIo\Manifest\CopyrightElement;

use function PHPUnit\Framework\throwException;

class CompanyNameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,CompanyName $company, User $user)
    {
        // dd($request->company_id);
        return $company->find($request->company_id);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($id, CompanyName $company)
    {
        //
        return ['company_names' => $company->where('relate_company_id',$id)->get()->fresh()->makeHidden(['created_at', 'updated_at','relate_company_id'])->toArray()];
  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
